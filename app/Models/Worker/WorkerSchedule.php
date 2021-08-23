<?php

namespace App\Models\Worker;

use App\Traits\ModelRelations\Worker\HasWorker;
use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array $array)
 * @method static upsert(array|false|\Illuminate\Support\Collection|string $data, string[] $array)
 */
class WorkerSchedule extends Model
{
    use HasFactory;
    use HasWorker;


    protected $guarded = [];
}
