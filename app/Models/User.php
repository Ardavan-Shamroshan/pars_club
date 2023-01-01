<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Modules\Admin\Entities\Notification;
use Modules\User\Filter\UserFilter;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use Sluggable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'profile_photo_path',
        'activation',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /**
     * Generate slug from defined source field
     */
    public function sluggable(): array {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['email', 'id'],
                'includeTrashed' => true,
            ]
        ];
    }

    /**
     * Filter
     */
    public function scopeFilter(Builder $builder, $request) {
        return (new UserFilter($request))->filter($builder);
    }

    /**
     * Accessors & Mutators
     */
    // full name using first and last names
    public function fullName(): Attribute {
        return Attribute::make(
            get: fn() => ($this->first_name !== null) ? "$this->first_name $this->last_name" : Null,
        );
    }

    // user activation
    public function activeUser(): Attribute {
        return Attribute::make(
            get: fn() => $this->activation == 1,
        );
    }

    /**
     * Relations
     */
    public function notifications() {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
