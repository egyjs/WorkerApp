<?php

namespace App\Helpers\EgyJsTools\Facades;

use App\Helpers\EgyJsTools\ArrayTool as Tool;
use Illuminate\Support\Facades\Facade;

/**
 * `ArrayTool` is a package to create an beautiful array code
 * @package App\Helpers\EgyJsTools
 *
 * @todo: create a package for this pretty tool
 * @method static \App\Helpers\EgyJsTools\ArrayTool  setKey($i)
 * @method static \App\Helpers\EgyJsTools\ArrayTool  start()
 * @method static string generate(bool $collect = false,bool $asString = false)
 */
class ArrayTool extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return Tool::class;
    }
}
