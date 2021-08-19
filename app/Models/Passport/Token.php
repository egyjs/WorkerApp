<?php

namespace App\Models\Passport;

use Egyjs\CacheQuery\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\Token as PassportToken;


class Token extends PassportToken
{
    use CacheQueryBuilder;
//    public $cacheForever = false;
}
