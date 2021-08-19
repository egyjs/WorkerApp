<?php

namespace App\Traits\ModelRelations\Common;

use App\Models\Common\Job;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method belongsTo(string $class)
 */
trait HasJob
{
    /**
     * @return BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
