<?php

namespace App\Models\Worker;

use App\Traits\ModelRelations\Worker\HasWorker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerRate extends Model
{
    use HasFactory;
    use HasWorker;

}
