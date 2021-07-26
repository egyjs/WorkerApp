<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @method static create(array $array)
 * @method static where(array[] $array)
 * @method static updateOrCreate(array $attributes, array $values = array())
 */
class UserDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'user_id',
        'platform',
        'app_version',
        'ip',
        'loggedin_at',
        'loggedout_at',
    ];

}
