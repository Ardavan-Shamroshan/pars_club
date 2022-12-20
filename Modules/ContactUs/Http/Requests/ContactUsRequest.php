<?php

namespace Modules\ContactUs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if ($this->isMethod('post'))
            return [
                'name' => ['sometimes', 'max:50'],
                'subject' => ['required', 'max:255'],
                'email' => ['sometimes', 'email'],
                'message' => ['required', 'max:20480'],
            ];
        else return [
            'response' => ['sometimes', 'max:20480'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
}
