<?php

namespace Modules\League\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'matches', 'won', 'loss', 'deal', 'goal', 'GD', 'points', 'league_team_id', 'slug'
    ];

    protected static function newFactory() {
        return \Modules\League\Database\factories\TeamResultFactory::new();
    }

    /**
     * Relations
     */
    // league team
    public function team() {
        return $this->belongsTo(LeagueTeam::class, 'league_team_id');
    }
}
