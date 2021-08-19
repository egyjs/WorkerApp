<?php

namespace App\Models\User;

use App\Traits\ModelRelations\Common\HasPlace;
use App\Traits\ModelRelations\User\HasUser;
use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    use HasFactory,CacheQueryBuilder;
    use HasPlace,HasUser;

    protected $guarded = [];
}
