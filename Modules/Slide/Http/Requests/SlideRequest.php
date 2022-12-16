<?php

namespace Modules\Slide\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SlideRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if ($this->isMethod('post'))
            return [
                'title' => ['required', 'max:255', 'min:5'],
                'body' => ['required', 'max:2048', 'min:5'],
                'url' => ['nullable', 'url', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'image' => ['required', 'image', 'mimes:png,jpg,jpeg,gif'],
                'status' => ['numeric', Rule::in(['0', '1'])],
            ];
        else
            return [
                'title' => ['required', 'max:255', 'min:5'],
                'body' => ['required', 'max:2048', 'min:5'],
                'url' => ['nullable', 'url', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'image' => ['image', 'mimes:png,jpg,jpeg,gif'],
                'status' => ['numeric', Rule::in(['0', '1'])],
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
