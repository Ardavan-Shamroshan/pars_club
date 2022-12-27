<?php

namespace Modules\Auth\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    protected static function newFactory()
    {
        return \Modules\Auth\Database\factories\OtpFactory::new();
    }


    /**
     * Relations
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
