<?php

namespace App\Models\Common;

use App\Models\User\User;
use App\Models\Worker\Worker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Http;
use App\Traits\Packages\Spatie\Translatable\HasTranslations;

/**
 * @method static create(array $array)
 * @method static first()
 */
class State extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name','description'];

    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }


//    public function setLatAttribute($value)
//    {
//        $geocodingAPI = Http::get("https://maps.google.com/maps/api/geocode/json?address=$client_state&sensor=true&region={$client->country->iso}&key=AIzaSyCX-o--0klF4hW11lyYPhMuFoR5LrHW6LI")->collect();
//        $this->attributes['lat'] = '';
//    }

//    public function setLngAttribute()
//    {
//
//    }
}
