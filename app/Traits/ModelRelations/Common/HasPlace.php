<?php

namespace App\Traits\ModelRelations\Common;

use App\Models\Common\{City, Country, State};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method hasMany(string $class)
 * @method belongsTo(string $class)
 */
trait HasPlace
{
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
}
