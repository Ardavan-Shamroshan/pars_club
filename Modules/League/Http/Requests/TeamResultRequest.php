<?php

namespace Modules\League\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamResultRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'matches' => ['sometimes'],
            'won' => ['sometimes'],
            'loss' => ['sometimes'],
            'deal' => ['sometimes'],
            'goal' => ['sometimes', 'string'],
            'GD' => ['sometimes'],
            'points' => ['sometimes'],
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
