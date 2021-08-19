<?php

namespace App\Models\User;


use App\Traits\ModelRelations\Common\HasCanceledOffer;
use App\Traits\ModelRelations\Common\HasPlace;
use App\Traits\ModelRelations\Common\HasRejectedIssue;
use App\Traits\ModelRelations\User\UserRelations;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @method static create(array $validatedData)
 * @method static find(int $id)
 * @method where(string $string, string $username)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
    // relations traits
    use HasPlace,HasRejectedIssue,HasCanceledOffer,UserRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'country_id',
        'state_id',
        'city_id',
        'last_ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    /**
     * Find the user instance for the given username.
     *
     * @param string $username
     * @return $this
     */
    public function findForPassport(string $username): User
    {
        return $this->where('phone', $username)->first();
    }





}
