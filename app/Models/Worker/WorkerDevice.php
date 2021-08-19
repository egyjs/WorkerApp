<?php

namespace App\Models\Worker;

use App\Traits\ModelRelations\Worker\HasWorker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(array[] $array)
 * @method static updateOrCreate(array $attributes, array $values = array())
 */

class WorkerDevice extends Model
{
    use HasFactory;
    use HasWorker;


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
