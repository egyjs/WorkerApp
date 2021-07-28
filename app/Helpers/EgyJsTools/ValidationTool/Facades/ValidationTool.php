<?php

namespace App\Helpers\EgyJsTools\ValidationTool\Facades;

use App\Helpers\EgyJsTools\ValidationTool\ValidationTool as Tool;
use Illuminate\Support\Facades\Facade;

/**
 * `ValidationTool` is a package to create an beautiful array code
 * @package App\Helpers\EgyJsTools
 *
 * @todo: create a package for this pretty tool
 * @method  Tool required($key)
 * @method  Tool regex($key,$regex)
 * @method  Tool requiredIf($key,$condition)
 * @method  Tool NotEqualTo($key,$value)
 * @method  Tool equalTo($key,$value)
 * @method  Tool exists($key,$table,$column = null)
 * @method static string generate(bool $collect = false,bool $asString = false)
 */

class ValidationTool extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return Tool::class;
    }
}
