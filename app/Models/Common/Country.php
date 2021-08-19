<?php

namespace App\Models\Common;

use App\Models\User\User;
use App\Models\Worker\Worker;
use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @method static create(array $array)
 * @method static first()
 */
class Country extends Model
{
    use HasFactory,HasTranslations,CacheQueryBuilder;

    public $translatable = ['name','description'];

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }
}
