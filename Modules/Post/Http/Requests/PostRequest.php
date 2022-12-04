<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post'))
            return [
                'title' => ['required', 'max:120', 'min:2'],
                'summary' => ['required', 'max:300', 'min:2'],
                'body' => ['required', 'max:20480', 'min:2'],
                'category_id' => ['required', Rule::exists('post_categories', 'id')],
                'author_id' => ['required', Rule::exists('users', 'id')],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,bmp,png,gif'],
                'tags' => ['nullable'],
                'published_at' => ['required','numeric'],

            ];
        else
            return [
                // 'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'title' => 'required|max:120|min:2',
                'summary' => 'required|max:300|min:5|regex:/^[آا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/:;،؛\n\r&?؟!«»" ًّ َ ِ ُ ْ () ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:post_categories,id',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => ['required', 'numeric', Rule::in(['0', '1'])],
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                // 'body' => 'required|max:20480|min:5|regex:/^[آا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/:;،؛\n\r&?؟!«»" ًّ َ ِ ُ ْ () ]+$/u',
                'body' => 'required|max:20480|min:5',
                'published_at' => 'numeric',
            ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * messages
     */
    public function attributes() {
        return [
            'author_id' => 'نویسنده'
        ];
    }
}
