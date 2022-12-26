<?php

namespace Modules\League\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeagueTeam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected static function newFactory() {
        return \Modules\League\Database\factories\LeagueTeamFactory::new();
    }

    /**
     * Relations
     */

    public function league() {
        return $this->belongsTo(League::class);
    }
}
