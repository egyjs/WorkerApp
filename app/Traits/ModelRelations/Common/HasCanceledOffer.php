<?php

namespace App\Traits\ModelRelations\Common;

use App\Models\Common\CanceledOffer;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method hasMany(string $class)
 * @method belongsTo(string $class)
 */
trait HasCanceledOffer
{
    public function all_canceled_offers(): HasMany
    {
        return $this->hasMany(CanceledOffer::class);
    }
}
