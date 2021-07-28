<?php

namespace App\Models\Worker;

use Geeky\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array $worker_jobs)
 */
class WorkerJob extends Model
{
    use HasFactory,CacheQueryBuilder;

    protected $guarded = [];
}
