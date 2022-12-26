<?php

namespace Modules\League\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeagueTeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
       if ($this->isMethod('post'))
            return [
                'name' => ['required', 'string'],
                'league_id' => ['required', Rule::exists('leagues', 'id')],
                'logo' => ['image', 'mimes:jpg,jpeg,bmp,png,gif'],
                'slug' => [Rule::unique('leagues', 'slug')]
            ];
        else return [
            'name' => ['required', 'string'],
            'league_id' => ['required', Rule::exists('leagues', 'id')],
            'logo' => ['image', 'mimes:jpg,jpeg,bmp,png,gif'],
            'slug' => [Rule::unique('leagues', 'slug')->ignore($this->team->id)]
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
