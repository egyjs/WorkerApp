<?php

namespace App\Traits\ModelRelations\Worker;

use App\Models\Worker\Worker;
use App\Models\Worker\WorkerOffer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOffer
{
    /**
     * @return BelongsTo
     */
    public function offer(): BelongsTo
    {
        return $this->belongsTo(WorkerOffer::class);
    }
}
