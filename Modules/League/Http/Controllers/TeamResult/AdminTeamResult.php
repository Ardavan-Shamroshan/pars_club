<?php

namespace Modules\League\Http\Controllers\TeamResult;

use Livewire\Component;

class AdminTeamResult extends Component
{
    public function render()
    {
        return view('league::livewire.team-result.admin-team-result')
            ->layout('admin::layouts.master');
    }
}
