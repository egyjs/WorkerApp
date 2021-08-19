<?php

namespace App\Models\Worker;

use App\Traits\ModelRelations\Worker\HasWorker;
use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerSchedule extends Model
{
    use HasFactory,CacheQueryBuilder;
    use HasWorker;


    protected $guarded = [];
}
