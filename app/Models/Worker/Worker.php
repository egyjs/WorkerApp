<?php

namespace App\Models\Worker;

use App\Http\Resources\Worker\WorkerResource;
use App\Traits\ModelRelations\{
    Common\HasCanceledOffer,
    Common\HasPlace,
    Common\HasRejectedIssue,
    Worker\WorkerRelations
};

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @method static find(int $id)
 * @method static create(array $validatedData)
 * @method static Worker where(string|array $string, $email = '')
 * @method static Worker active()
 * @method static Worker whereJobs(int $job_id, $date)
 * @method whereHas(string $table, \Closure $param)
 * @method join(string $string, \Closure $param)
 * @method first()
 * @property string $status
 */
class Worker extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    use HasRejectedIssue, HasCanceledOffer, WorkerRelations, HasPlace;

//    protected $cacheForever =true;

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
        'ssn_photo',
        'status',
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


    // get attribute

    /**
     * @example +11234567890
     *
     * @return string +country_code.phone
     */
    public function getPhoneNumberAttribute(): string
    {
        return "+".$this->country->un_code.$this->attributes['phone'];
    }

    // function
    public function toArray(): WorkerResource
    {
        return new WorkerResource($this);
    }

    public function isActive(): bool
    {
        return $this->status == 'APPROVED';
    }

    // scopes

    /**
     * Scope a query to only include active workers.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query
            ->where('status', 'APPROVED')// phone_verified_at || email_verified_at
            ;
    }

    /**
     * 1. get related job by $job_id
     * 2. where this job is active and reviewed
     *
     *
     * @param Builder $query
     * @param $job_id
     * @param $date
     * @return Builder
     */
    public function scopeWhereJobs(Builder $query, $job_id, $date): Builder
    {
        return $query->withHas('jobs', function ($q) use ($job_id) {
            return $q->where('job_id', $job_id)->where('active', 1);
        });
    }


    public function scopeWithHas($query, $relation, $constraint)
    {
        return $query
            ->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

}
