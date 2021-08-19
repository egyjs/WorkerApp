<?php

namespace App\Providers;

use App\Bindings\CacheRepository;

use Illuminate\Cache\ArrayStore;
use Illuminate\Cache\RedisStore;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\Repository;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->extend(Repository::class, function (Repository$baseRepository,$app) {
//            return $app->make(CacheRepository::class,['store'=>$app->make(Store::class)]);
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
