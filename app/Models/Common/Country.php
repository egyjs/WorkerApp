<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @method static create(array $array)
 * @method static first()
 */
class Country extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name','description'];

}
