<?php

namespace App\Models\Common;

use App\Traits\ModelRelations\{User\HasUser, Worker\HasOffer, Worker\HasWorker};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanceledOffer extends Model
{
    use HasFactory;
    use HasWorker,HasUser,HasOffer;
}
