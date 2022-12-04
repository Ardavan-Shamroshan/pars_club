<?php

namespace Modules\Post\Entities;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\PostCategory\Entities\PostCategory;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected static function newFactory() {
        return \Modules\Post\Database\factories\PostFactory::new();
    }

    /**
     * Generate slug from defined source field
     */
    public function sluggable(): array {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['title', 'id'],
                'includeTrashed' => true,
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = [
        'author_id', 'category_id', 'title', 'label', 'summary', 'body', 'image', 'slug', 'status', 'commentable', 'tags', 'published_at'
    ];

    /**
     * relations
     */

    // category
    public function category() {
        return $this->belongsTo(PostCategory::class);
    }

    // author
    public function author() {
        return $this->belongsTo(User::class);
    }
}
