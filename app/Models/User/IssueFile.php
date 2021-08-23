<?php

namespace App\Models\User;


use App\Traits\ModelRelations\User\HasIssue;
use App\Traits\ModelRelations\User\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 * @method static insert(array $issueFilesData)
 */
class IssueFile extends Model
{
    use HasFactory;
    use HasUser,HasIssue;

    protected $guarded = [];




}
