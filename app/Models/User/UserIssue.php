<?php

namespace App\Models\User;

use App\Http\Resources\User\Issue\UserIssueFilesResource;
use App\Http\Resources\User\Issue\UserIssueResource;
use App\Traits\ModelRelations\{Common\HasJob, Common\HasRejectedIssue, User\HasUser, Worker\HasWorker};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find()
 * @method static where(string $string,string $string,)
 */
class UserIssue extends Model
{
    use HasFactory;
    use HasUser,HasWorker,HasRejectedIssue,HasJob;


    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(IssueFile::class);
    }
}
