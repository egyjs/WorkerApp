<?php

namespace App\Lib\CacheHandler;

class CacheHandler
{
    public $stats = [];

    /**
     * @param $key
     * @param $value
     */
    public function setStats($key, $value): void
    {
        $this->stats[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getStats($key)
    {
        //return $this->stats[$key];
        //return $this->stats[$key] ?? null; // can't make `nothingHere` as null  because  stats[$key] = null
        return $this->stats[$key] ?? 'nothingHere'; // can't make `nothingHere` as null  because  stats[$key] = null
    }


}
