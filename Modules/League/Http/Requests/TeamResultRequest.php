<?php

namespace Modules\League\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamResultRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'league_team_id' => ['sometimes', Rule::exists('league_teams', 'id')],
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
