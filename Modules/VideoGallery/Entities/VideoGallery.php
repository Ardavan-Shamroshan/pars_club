<?php

namespace Modules\VideoGallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'video', 'description', 'status'
    ];

    protected static function newFactory() {
        return \Modules\VideoGallery\Database\factories\VideoGalleryFactory::new();
    }
}
