<?php

namespace App\Models\User;

use App\Traits\ModelRelations\Common\HasPlace;
use App\Traits\ModelRelations\User\HasUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find(int $user_address_id)
 */
class UserAddress extends Model
{
    use HasFactory;
    use HasPlace,HasUser;

    protected $guarded = [];
}
