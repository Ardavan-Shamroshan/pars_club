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
        return [
            'name' => ['sometimes', 'max:50'],
            'subject' => ['required', 'max:255'],
            'email' => ['sometimes', 'email'],
            'message' => ['required', 'max:20480'],
            'response' => ['sometimes', 'max:20480'],
            'is_read' => ['sometimes', 'numeric', Rule::in([0, 1])],
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
