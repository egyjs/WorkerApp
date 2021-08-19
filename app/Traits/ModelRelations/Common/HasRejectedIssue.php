<?php

namespace App\Traits\ModelRelations\Common;

use App\Models\Common\RejectedIssue;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method hasMany(string $class)
 * @method belongsTo(string $class)
 */
trait HasRejectedIssue
{
    public function rejected_issues(): HasMany
    {
        return $this->hasMany(RejectedIssue::class);
    }
}
