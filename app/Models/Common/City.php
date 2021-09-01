<?php

namespace App\Models\Common;

use App\Models\User\User;
use App\Models\Worker\Worker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\Packages\Spatie\Translatable\HasTranslations;

/**
 * @method static create(array $array)
 */
class City extends Model
{
    use HasFactory,HasTranslations;

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
