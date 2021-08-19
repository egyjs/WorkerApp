<?php

namespace App\Helpers\EgyJsTools\ValidationTool\Facades;

use App\Helpers\EgyJsTools\ValidationTool\ValidationTool as Tool;
use Illuminate\Support\Facades\Facade;

/**
 * `ValidationTool` is a package to create an beautiful array code
 * @package App\Helpers\EgyJsTools
 *
 * @todo: create a package for this pretty tool
 * @method  Tool setKey($key)
 * @method  Tool required($key)
 * @method  Tool regex($regex,$key=null)
 * @method  Tool requiredIf($condition,$key=null)
 * @method  Tool NotEqualTo($value,$key=null)
 * @method  Tool equalTo($value,$key=null)
 * @method  Tool exists($table,$column = null,$key= null)
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
