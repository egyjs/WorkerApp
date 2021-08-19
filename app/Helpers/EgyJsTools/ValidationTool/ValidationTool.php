<?php

namespace App\Helpers\EgyJsTools\ValidationTool;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\NotIn;
use Illuminate\Validation\Rules\RequiredIf;

class ValidationTool
{
    public $rules = [];

    protected $lastKey = '';



    public function setKey($key): ValidationTool
    {
        $this->lastKey = $key;
        return $this;
    }

    public function regex($regex,$key = null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = "regex:$regex";
        return $this;
    }


    public function required($key =null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = "required";
        return $this;
    }



    public function requiredIf($condition,$key=null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = new RequiredIf($condition);
        return $this;
    }

    public function equalTo($value,$key=null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = new In($value);
        return $this;
    }

    public function NotEqualTo($value,$key=null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = new NotIn($value);
        return $this;
    }

    public function exists($table,$column = null,$key =null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = "exists:$table".($column != null?",$column":'');
        return $this;
    }


    public function asEmail($key =null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = "email";
        return $this;
    }

    public function asDate($key = null): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = "date";
        return $this;
    }
    public function asImage($key): ValidationTool
    {
        $this->lastKey = $key != null
            ?$key
            :$this->lastKey;
        $this->rules[$this->lastKey][] = "image";
        return $this;
    }


    private function class_mutates_methods(): array
    {
        // idea: getAttribute
        $methods = collect( get_class_methods($this));
        return $methods->filter(function ($i){
            return Str::startsWith($i, 'as');
        })->values()->toArray();
    }


    public function generate(bool $asString = false): array
    {
        foreach ($this->rules as $key =>$rule){
            $stringArray[$key] = implode('|',$rule);
        }
         return $asString
             ? $stringArray
             : $this->rules ;

    }
}
