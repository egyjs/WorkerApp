<?php

namespace App\Traits\ModelRelations\Worker;


use App\Models\Common\Job;

use App\Models\Worker\{WorkerDevice, WorkerOffer, WorkerRate, WorkersBounce, WorkerSchedule, WorkerWallet};
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany};

/**
 * @method hasMany(string $class)
 * @method hasManyThrough(string $class, string $class)
 */
trait WorkerRelations
{


    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(
            Job::class,
            'worker_jobs',
            'worker_id',
            'job_id')
            ->wherePivot('active', '=', 1)
            ->withPivot(['certificate', 'active', 'price_range_from', 'price_range_to']);
    }

    public function devices(): HasMany
    {
        return $this->hasMany(WorkerDevice::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(WorkerOffer::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(WorkerRate::class);
    }

    public function bonuses(): HasMany
    {
        return $this->hasMany(WorkersBounce::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(WorkerSchedule::class);
    }

    public function wallets(): HasMany
    {
        return $this->hasMany(WorkerWallet::class);
    }

    public function canceled_offers(): HasMany
    {
        return $this->all_canceled_offers()
            ->where('canceled_by', 'WORKER');
    }
}
