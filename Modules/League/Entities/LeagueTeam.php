<?php

namespace Modules\League\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeagueTeam extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected $fillable = [
        'name', 'league_id', 'logo', 'slug'
    ];

    protected static function newFactory() {
        return \Modules\League\Database\factories\LeagueTeamFactory::new();
    }

    /**
     * Generate slug from defined source field
     */
    public function sluggable(): array {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['name', 'id'],
                'includeTrashed' => true,
            ]
        ];
    }


    /**
     * Relations
     */
    // league
    public function league() {
        return $this->belongsTo(League::class);
    }

    // team result
    public function result() {
        return $this->hasOne(TeamResult::class);
    }
}
