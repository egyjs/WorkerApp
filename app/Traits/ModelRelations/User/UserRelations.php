<?php

namespace App\Traits\ModelRelations\User;

use App\Models\User\{IssueFile, UserAddress, UserDevice, UserIssue, UserRate, UserWallet};
use Illuminate\Database\Eloquent\Relations\{HasMany, HasManyThrough};

/**
 * @method hasMany(string $class)
 * @method hasManyThrough(string $class, string $class)
 */
trait UserRelations
{

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function issues(): HasMany
    {
        return $this->hasMany(UserIssue::class);
    }

    public function wallets(): HasMany
    {
        return $this->hasMany(UserWallet::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(UserRate::class);
    }


    public function devices(): HasMany
    {
        return $this->hasMany(UserDevice::class);
    }

    public function issues_files(): HasManyThrough
    {
        return $this->hasManyThrough(IssueFile::class, UserIssue::class);
    }

    public function canceled_offers(): HasMany
    {
        return $this->all_canceled_offers()
            ->where('canceled_by', 'USER');
    }

}
