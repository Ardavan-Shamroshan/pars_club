<?php

namespace Modules\VideoGallery\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VideoGalleryRequest extends FormRequest
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
                'description' => ['required', 'max:2048', 'min:5'],
                'video' => ['required', 'file', 'mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime'],
                'status' => ['numeric', Rule::in(['0', '1'])],
            ];
        else
            return [
                'title' => ['required', 'max:255', 'min:5'],
                'description' => ['required', 'max:2048', 'min:5'],
                'video' => ['file', 'mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime'],
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
