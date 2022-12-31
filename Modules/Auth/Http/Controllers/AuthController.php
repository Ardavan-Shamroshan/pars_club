<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Modules\Auth\Entities\Otp;
use Modules\Auth\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function loginRegisterForm() {
        return view('auth::login-register');
    }

    /**
     * @throws \Exception
     */
    public function loginRegister(AuthRequest $request) {
        $inputs = $request->all();

        // check id is email or not
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['id'])->first();
            if ($user === null) {
                $newUser['name'] = $inputs['name'];
                $newUser['email'] = $inputs['id'];
            }
        } //check id is mobile or not
        elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])) {
            $type = 0; // 0 => mobile;

            // all mobile numbers are in on format 9** *** ***
            $inputs['id'] = ltrim($inputs['id'], '0');
//            $inputs['id'] = substr($inputs['id'], 0, 2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_starts_with($inputs['id'], '98') ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);
            $user = User::where('mobile', $inputs['id'])->first();

            if ($user === null) {
                $newUser['name'] = $inputs['name'];
                $newUser['mobile'] = $inputs['id'];
            }
        } else {
            $errorText = 'شناسه ورودی شما نه شماره موبایل است نه ایمیل';
            toast($errorText, 'error');
            return redirect()->route('auth.login-register-form');
        }

        // user not registered before
        if ($user === null) {
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;
            $user = User::query()->create($newUser);
        }

        // create otp code
        $otpCode = random_int(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['id'],
            'type' => $type,
        ];
        Otp::query()->create($otpInputs);

        //send sms
        if ($type === 0) {
            //send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setText("باشگاه فرهنگی ورزشی پارس برازجان  \n  کد تایید : $otpCode");
            $smsService->setIsFlash(true);
            $messagesService = new MessageService($smsService);
            $messagesService->send();
        } // send email
        elseif ($type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'subject' => 'کد فعال سازی وب سایت باشگاه فرهنگی ورزشی پارس برازجان',
                'message' => "کد فعال سازی شما : $otpCode",
                'response' => ''
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('no-reply@gmail.com', 'fcpars.ir');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['id']);
            $messagesService = new MessageService($emailService);
            $messagesService->send();
        }

        return redirect()->route('auth.login-confirm-form', $token);
    }

    public function loginConfirmForm($token) {
        $otp = Otp::query()->where('token', $token)->firstOrFail();
        if ($otp === null) {
            toast('آدرس وارد شده نا معتبر می باشد', 'error');
            return redirect()->route('auth.login-register-form');
        }
        return view('auth::login-confirm', compact('token', 'otp'));
    }

    public function loginConfirm($token, AuthRequest $request) {
        $inputs = $request->all();
        $otp = Otp::query()->where('token', $token)
            ->where('used', 0)
            ->where('created_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString())
            ->first();

        if ($otp === null) {
            toast('کد وارد شده نامعتبر است', 'error');
            return redirect()->route('auth.login-register-form', $token);
        }
        // otp not match
        if ($otp->otp_code !== $inputs['otp']) {
            toast('کد وارد شده صحیح نمی باشد', 'error');
            return redirect()->route('auth.login-confirm-form', $token);
        }

        // everything is OK!
        $otp->update(['used' => 1]);
        $user = $otp->user()->first();

        if ($otp->type === 0 && empty($user->mobile_verified_at))
            $user->update(['mobile_verified_at' => Carbon::now()]);
        elseif ($otp->type === 1 && empty($user->email_verified_at))
            $user->update(['email_verified_at' => Carbon::now()]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginResendOtp($token) {
        $otp = Otp::query()->where('token', $token)->where('created_at', '<=', Carbon::now()->subMinutes(5)->toDateTimeString())->firstOrFail();
        if ($otp === null) {
            toast('آدرس وارد شده نا معتبر است', 'error');
            return redirect()->route('auth.login-register-form', $token);
        }
        $user = $otp->user()->first();

        // create otp code
        $otpCode = random_int(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $otp->login_id,
            'type' => $otp->type,
        ];
        Otp::query()->create($otpInputs);

        //send sms
        if ($otp->type === 0) {
            //send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setText("باشگاه فرهنگی ورزشی پارس برازجان  \n  کد تایید : $otpCode");
            $smsService->setIsFlash(true);
            $messagesService = new MessageService($smsService);
            $messagesService->send();
        } // send email
        elseif ($otp->type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'subject' => 'کد فعال سازی وب سایت باشگاه فرهنگی ورزشی پارس برازجان',
                'message' => "کد فعال سازی شما : $otpCode",
                'response' => ''
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('no-reply@gmail.com', 'fcpars.ir');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($otp->login_id);
            $messagesService = new MessageService($emailService);
            $messagesService->send();
        }

        return redirect()->route('auth.login-confirm-form', $token);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
