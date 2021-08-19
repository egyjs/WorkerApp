<?php

namespace App\Models\Common;

use App\Traits\ModelRelations\User\HasIssue;
use App\Traits\ModelRelations\User\HasUser;
use App\Traits\ModelRelations\Worker\HasOffer;
use App\Traits\ModelRelations\Worker\HasWorker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;
    use HasWorker,HasUser,HasIssue,HasOffer;
}
