<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ContactUs\Entities\ContactUs;
use Modules\ContactUs\Http\Requests\ContactUsRequest;
use Modules\Setting\Entities\Setting;

class AdminContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $setting = Setting::query()->first();
        $contacts = ContactUs::query()->paginate(10);
        $contactsCount = ContactUs::query()->count();
        return view('contactus::admin.index', compact('contacts', 'contactsCount', 'setting'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('contactus::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contactus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ContactUsRequest $request, ContactUs $contact)
    {
        $inputs = $request->all();

        // contact read and answered
        $inputs['is_read'] = 1;

        // Send response to contact-email
        $emailService = new EmailService();
        $details = [
            'title' => 'پاسخ مدیریت وب سایت باشگاه فرهنگی ورزشی پارس',
            'subject' => $contact->subject,
            'message' => $contact->message,
            'response' => $inputs['response']
        ];
        $emailService->setDetails($details);
        $emailService->setFrom('noreply@example.com', 'example');
        $emailService->setSubject('پاسخ تماس');
        $emailService->setTo($contact->email); // set send to location

        $messagesService = new MessageService($emailService);
        $messagesService->send(); // fire

        toast('پاسخ با موفقیت ثبت و به ایمیل تماس گیرنده ارسال شد', 'success');
        $contact->update($inputs);
        return redirect()->route('admin.contact-us');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(ContactUs $contact)
    {
        toast('تماس با موفقیت پاگ شد', 'success');
        $contact->delete($contact);
        return redirect()->route('admin.contact-us');
    }
}
