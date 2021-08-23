<?php

namespace App\Models\Worker;

use App\Traits\ModelRelations\Common\HasJob;
use App\Traits\ModelRelations\Worker\HasWorker;
use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array $worker_jobs)
 * @method static create(array $array)
 */
class WorkerJob extends Model
{
    use HasFactory,CacheQueryBuilder;
    use HasWorker,HasJob;

    protected $guarded = [];
}
