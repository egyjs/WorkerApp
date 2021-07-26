<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @method static create(array $array)
 */
class City extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name','description'];
}
