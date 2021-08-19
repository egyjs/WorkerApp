<?php

namespace App\Models\User;


use App\Traits\ModelRelations\User\HasIssue;
use App\Traits\ModelRelations\User\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueFile extends Model
{
    use HasFactory;
    use HasUser,HasIssue;
}
