<?php

namespace App\Bindings;

use App\Lib\CacheHandler\CacheHandler;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Cache\Repository;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Log;

class CacheRepository extends Repository
{

    /**
     * @param Store $store
     * @param CacheHandler $cacheHandler
     */
    public function __construct(Store $store, CacheHandler $cacheHandler)
    {
        $this->cacheHandler = $cacheHandler;
        $this->store = $store;
    }

//    public function get($key, $default = null)
//    {
//
//        if (is_array($key)) {
//            return $this->many($key);
//        }
//        $cacheHandler = $this->cacheHandler;
//
//
//        // already cached
//        $cachedValue = $cacheHandler->getStats($key);
//
//
//
////        $value = $cachedValue == null
////            ? $this->store->get($this->itemKey($key))
////            : $cachedValue;
//
////        $value = $this->store->get($this->itemKey($key));
//        dump($key);
//        if ($cachedValue == 'nothingHere'){
//            $value = $this->store->get($this->itemKey($key));
//            $cacheHandler->setStats($key,$value);
//            Log::info('$cacheHandler->set: '.$key.': '.$value);
//        }else{
//            $value = $cachedValue;
//
//            Log::info('$cacheHandler->get: '.$key.': '.$value);
//        }
////        Log::info($cacheHandler->stats);
//
//
//
//        // If we could not find the cache value, we will fire the missed event and get
//        // the default value for this cache value. This default could be a callback
//        // so we will execute the value function which will resolve it if needed.
//        if (is_null($value)) {
//            $this->event(new CacheMissed($key));
//
//            $value = value($default);
//        } else {
//            $this->event(new CacheHit($key, $value));
//        }
//
//        return $value;
//    }



}
