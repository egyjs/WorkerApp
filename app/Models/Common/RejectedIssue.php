<?php

namespace App\Models\Common;

use App\Traits\ModelRelations\User\HasUser;
use App\Traits\ModelRelations\Worker\HasWorker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class RejectedIssue extends Model
{
    use HasFactory;
    use HasUser,HasWorker;

    protected $guarded = [];
}
