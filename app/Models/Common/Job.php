<?php

namespace App\Models\Common;

use App\Models\Worker\Worker;
use App\Traits\ModelRelations\Worker\HasWorker;
use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

/**
 * @method static whereIn(string $string, \Illuminate\Support\Collection $collection)
 */
class Job extends Model
{
    use HasFactory,HasTranslations,CacheQueryBuilder;

    public $translatable = ['name','description'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'parent_job','id');
    }

    /**
     * @return BelongsToMany
     */
    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(
            Worker::class,
            'worker_jobs',
            'job_id',
            'worker_id')
            ;
    }
}
