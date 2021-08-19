<?php

namespace App\Models\User;

use App\Traits\ModelRelations\{Common\HasJob, Common\HasRejectedIssue, User\HasUser, Worker\HasWorker};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class UserIssue extends Model
{
    use HasFactory;
    use HasUser,HasWorker,HasRejectedIssue,HasJob;


    protected $guarded = [];
}
