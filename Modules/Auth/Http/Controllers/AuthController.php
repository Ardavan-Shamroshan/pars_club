<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
            if ($user === null)
                $newUser['email'] = $inputs['id'];
        }

        //check id is mobile or not
        elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])) {
            $type = 0; // 0 => mobile;

            // all mobile numbers are in on format 9** *** ***
            $inputs['id'] = ltrim($inputs['id'], '0');
//            $inputs['id'] = substr($inputs['id'], 0, 2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_starts_with($inputs['id'], '98') ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);
            $user = User::where('mobile', $inputs['id'])->first();

            if ($user === null)
                $newUser['mobile'] = $inputs['id'];

        } else {
            $errorText = 'شناسه ورودی شما نه شماره موبایل است نه ایمیل';
            return redirect()->route('auth.login-register-form')->withErrors(['id' => $errorText]);
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
            $smsService->setText("مرکز آپا دانشگاه چمران اهواز  \n  کد تایید : $otpCode");
            $smsService->setIsFlash(true);
            $messagesService = new MessageService($smsService);
            $messagesService->send();
        } // send email
        elseif ($type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode",
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('no-reply@gmail.com', 'Apa.scu.ac.ir');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['id']);
            $messagesService = new MessageService($emailService);
            $messagesService->send();
        }

        return redirect()->route('auth.user.login-confirm-form', $token);
    }

    public function loginConfirmForm($token) {
        $otp = Otp::query()->where('token', $token)->firstOrFail();
        if ($otp === null)
            return redirect()->route('auth.user.login-register-form')->withErrors(['id' => 'آدرس وارد شده نا معتبر می باشد']);
        return view('app.user.auth.login-confirm', compact('token', 'otp'));
    }

    public function loginConfirm($token, LoginRegisterRequest $request) {
        $inputs = $request->all();
        $otp = Otp::query()->where('token', $token)
            ->where('used', 0)
            ->where('created_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString())
            ->first();

        if ($otp === null)
            return redirect()->route('auth.user.login-register-form', $token)->withErrors(['id', 'کد وارد شده نامعتبر است']);

        // otp not match
        if ($otp->otp_code !== $inputs['otp'])
            return redirect()->route('auth.user.login-confirm-form', $token)->withErrors(['otp', 'کد وارد شده صحیح نمی باشد']);


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
        if ($otp === null)
            return redirect()->route('auth.user.login-register-form', $token)->withErrors(['id' => 'آدرس وارد شده نا معتبر است']);

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
            $smsService->setText("مرکز آپا دانشگاه چمران اهواز  \n  کد تایید : $otpCode");
            $smsService->setIsFlash(true);
            $messagesService = new MessageService($smsService);
            $messagesService->send();
        } // send email
        elseif ($otp->type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode",
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('no-reply@gmail.com', 'Apa.scu.ac.ir');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($otp->login_id);
            $messagesService = new MessageService($emailService);
            $messagesService->send();
        }

        return redirect()->route('auth.user.login-confirm-form', $token);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
