<?php

namespace App\Models\Worker;

use App\Models\Common\City;
use App\Models\Common\Country;
use App\Models\Common\Job;
use App\Models\Common\State;
use Geeky\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @method static find(int $id)
 * @method static create(array $validatedData)
 * @method static where(string|array $string, $email = '')
 */
class Worker extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens,CacheQueryBuilder;

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
        'last_ip',
        'photo',
        'driver_license',
        'driver_license_photo',
        'ssn',
        'ssn_photo'
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



    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function jobs(): BelongsToMany
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Job::class,
            'worker_jobs',
            'worker_id',
            'job_id')
            ->withPivot(['certificate','active']);
//            ->wherePivot('active','=',1)

    }

}
