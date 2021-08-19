<?php

namespace App\Traits\ModelRelations\User;


use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method hasMany(string $class)
 * @method belongsTo(string $class)
 */
trait HasUser
{

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
