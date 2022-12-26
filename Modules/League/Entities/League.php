<?php

namespace Modules\League\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name', 'title', 'logo', 'slug'
    ];

    protected static function newFactory() {
        return \Modules\League\Database\factories\LeagueFactory::new();
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
    public function teams() {
        return $this->hasMany(LeagueTeam::class);
    }
}
