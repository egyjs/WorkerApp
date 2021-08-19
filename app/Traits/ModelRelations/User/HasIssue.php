<?php

namespace App\Traits\ModelRelations\User;

use App\Models\User\UserIssue;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method hasMany(string $class)
 * @method belongsTo(string $class)
 */
trait HasIssue
{

    /**
     * @return BelongsTo
     */
    public function issue(): BelongsTo
    {
        return $this->belongsTo(UserIssue::class);
    }
}
