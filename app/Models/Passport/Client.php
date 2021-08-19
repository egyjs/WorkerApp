<?php

namespace App\Models\Passport;

use Egyjs\CacheQuery\CacheQueryBuilder;
use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    use CacheQueryBuilder;
}
