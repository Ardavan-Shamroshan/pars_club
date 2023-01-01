<?php

namespace Modules\Comment\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\Notification;
use Modules\Comment\Filters\CommentFilter;

class Comment extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'body',
        'author_id',
        'parent_id',
        'commentable_id',
        'commentable_type',
        'seen',
        'approved',
        'status'
    ];

    protected static function newFactory() {
        return \Modules\Comment\Database\factories\CommentFactory::new();
    }

    /**
     * Filter
     */
    public function scopeFilter(Builder $builder, $request) {
        return (new CommentFilter($request))->filter($builder);
    }

    /**
     * Relations
     */


    // Author
    public function author() {
        return $this->belongsTo(User::class);
    }

    // Parent
    public function parent() {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }

    // Answers
    public function answers() {
        return $this->hasMany($this, 'parent_id')->with('answers');
    }

    // Polymorphic
    public function commentable() {
        return $this->morphTo();
    }

    /**
     * Accessors & Mutators
     */

    /**
     * $this->approved == 1: true
     * $this->approved == 0: false
     * @return Attribute
     */
    public function approval(): Attribute {
        return Attribute::make(
            get: fn() => $this->approved == 1,
        );
    }
}
