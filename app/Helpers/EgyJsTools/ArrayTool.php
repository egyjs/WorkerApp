<?php

namespace App\Helpers\EgyJsTools;

use Illuminate\Support\Facades\Facade;

class ArrayTool
{

    public $arr = [];

    protected $lastI = 0;

    public function start(): ArrayTool
    {
        return $this;
    }
    /**
     *
     */
    public function setKey($i): ArrayTool
    {
        $this->lastI = $i;
        $this->arr[$this->lastI] = [];
        return $this;
    }

    /**
     * @param array $array
     * @param $i
     * @return $this
     */
    public function setArray(array $array,$i = null): ArrayTool
    {
        $this->arr[$i??$this->lastI] = $array;
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @param null $i
     * @return $this
     */
    public function setItem($key,$value = null,$i = null): ArrayTool
    {
        if (is_array($key)){
            $this->arr[$i??$this->lastI][] = $key;
        }else{
            $this->arr[$i??$this->lastI][$key] = $value;
        }
        return $this;
    }





    public function generate(bool $collect = false,bool $asString = false)
    {
        $stringArray = json_encode($this->arr,JSON_PRETTY_PRINT);

        if ($asString) return $stringArray;
        if ($collect) return collect(json_decode($stringArray));

        return $this->arr;
    }
}
