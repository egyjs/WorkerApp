<?php

namespace App\Models\Worker;

use App\Traits\ModelRelations\Common\HasJob;
use App\Traits\ModelRelations\User\HasIssue;
use App\Traits\ModelRelations\User\HasUser;
use App\Traits\ModelRelations\Worker\HasWorker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerOffer extends Model
{
    use HasFactory;
    use HasWorker,HasUser,HasIssue,HasJob;

}
