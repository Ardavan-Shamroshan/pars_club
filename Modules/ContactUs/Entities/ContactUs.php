<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact_us';

    protected $fillable = [
        'name', 'subject', 'message', 'email', 'is_read', 'response'
    ];

    protected static function newFactory() {
        return \Modules\ContactUs\Database\factories\ContactUsFactory::new();
    }

    /**
     * Accessors and Mutators
     */
    public function read(): Attribute {
        return Attribute::make(
            get: fn() => $this->is_read == 1 ? 'پاسخ داده شده' : 'پاسخ داده نشده',
        );
    }
}
