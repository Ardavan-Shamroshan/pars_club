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
    public function rules() {
        if ($this->isMethod('post'))
            return [
                'title' => ['required', 'max:120', 'min:2'],
                'summary' => ['required', 'max:300', 'min:2'],
                'body' => ['required', 'max:20480', 'min:2'],
                'category_id' => ['required', Rule::exists('post_categories', 'id')],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,bmp,png,gif'],
                'tags' => ['nullable'],
                'label' => ['nullable'],
                'published_at' => ['required', 'numeric'],
                'slug' => [Rule::unique('posts', 'slug')],
            ];
        else
            return [
                'title' => ['required', 'max:120', 'min:2'],
                'summary' => ['required', 'max:300', 'min:2'],
                'body' => ['required', 'max:20480', 'min:2'],
                'category_id' => ['required', Rule::exists('post_categories', 'id')],
                'image' => ['image', 'mimes:jpg,jpeg,bmp,png,gif'],
                'tags' => ['nullable'],
                'label' => ['nullable'],
                'published_at' => ['required', 'numeric'],
                'slug' => [Rule::unique('posts', 'slug')->ignore($this->post->id)]
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

    /**
     * messages
     */
    public function attributes() {
        return [
            //
        ];
    }
}
