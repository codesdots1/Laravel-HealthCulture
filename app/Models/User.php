<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'username_verified',
        'password',
        'role',
        'verification_code',
        'countrycode',
        'phonecode',
        'phoneno',
        'status',
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'nationality',
        'passport_number',
        'user_image',
        'user_passport_id_image',
        'coach_banner_file',
        'coach_trailer_file',
        'base_currency',
        'monthly_subscription_fee',
        'google_id',
        'facebook_id',
        'login_type',
        'social_type',
        'social_username',
     ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */

    public function getJWTCustomClaims()
    {
        return [];
    }
}
