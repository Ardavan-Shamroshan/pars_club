<?php

namespace Modules\League\Http\Controllers\TeamResult;

use App\Models\Team;
use Livewire\Component;
use Modules\League\Entities\LeagueTeam;

class AdminTeamResult extends Component
{
    public $editResultIndex = null;

//    public $rules = [
//        'result.matches' => ['sometimes'],
//        'result.won' => ['sometimes'],
//        'result.loss' => ['sometimes'],
//        'result.deal' => ['sometimes'],
//        'result.goal' => ['sometimes', 'string'],
//        'result.GD' => ['sometimes'],
//        'result.points' => ['sometimes'],
//    ];

    public function mount() {

    }

    public function editResult($resultIndex)
    {
        $this->editResultIndex = $resultIndex;
    }

    public function render()
    {
        $teams = LeagueTeam::query()->paginate(10);
        $teamsCount = LeagueTeam::query()->count();
        return view('league::livewire.team-result.admin-team-result', ['teams' => $teams, 'teamsCount' => $teamsCount])
            ->layout('admin::layouts.master');
    }
}
