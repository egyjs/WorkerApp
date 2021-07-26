<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Job extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name','description'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'parent_job','id');
    }
}
