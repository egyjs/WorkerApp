<?php

namespace App\Traits\ModelRelations\Worker;

use App\Models\Worker\Worker;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasWorker
{
    /**
     * @return BelongsTo
     */
    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }
}
