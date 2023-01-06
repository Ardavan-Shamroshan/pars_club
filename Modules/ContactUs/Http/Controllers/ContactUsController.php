<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ContactUs\Entities\ContactUs;
use Modules\ContactUs\Http\Requests\ContactUsRequest;
use Modules\ContactUs\Notifications\NewContact;
use Modules\Setting\Entities\Setting;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $setting = Setting::query()->first();
        return view('contactus::index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('contactus::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ContactUsRequest $request) {
        $inputs = $request->all();

        // authenticated user contact - no inputs['name'], inputs['email']
        if (!array_key_exists('name', $inputs) || !array_key_exists('email', $inputs)) {
            $inputs['name'] = Auth::user()->fullname ?? Auth::user()->name;
            $inputs['email'] = Auth::user()->email;
            $inputs['is_read'] = 0;
        }
        // guest user contact
        else
            $inputs['is_read'] = 0;

        $contact = ContactUs::query()->create($inputs);

        // get all admin users
        $adminUsers = User::query()->where('user_type', 1)->get();
        // define details of new comment notification
        $details = [
            'name' => $contact->name,
            'email' => $contact->email,
            'subject' => $contact->subject,
            'message' => 'تمایس جدیدی دارید'
        ];
        // send notification for all admin users
        foreach ($adminUsers as $admin) {
            $admin->notify(new NewContact($details));
        }

        alert()->success('تماس شما با موفقیت فرستاده شد.', 'صندوق ایمیل خود را برای دریافت پاسخ بررسی کنید');
        return redirect()->route('home');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('contactus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id) {
        //
    }
}
