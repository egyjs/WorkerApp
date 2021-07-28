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


    protected const regex_patterns = [
        'password.'
    ];


    public function regex($regex,$key): ValidationTool
    {
        $this->rules[$key][] = "regex:$regex";
        return $this;
    }


    public function required($key): ValidationTool
    {
        $this->rules[$key][] = "required";
        return $this;
    }



    public function requiredIf($condition,$key): ValidationTool
    {
        $this->rules[$key][] = new RequiredIf($condition);
        return $this;
    }

    public function equalTo($key,$value): ValidationTool
    {
        $this->rules[$key][] = new In($value);
        return $this;
    }

    public function NotEqualTo($key,$value): ValidationTool
    {
        $this->rules[$key][] = new NotIn($value);
        return $this;
    }

    public function exists($key,$table,$column = null): ValidationTool
    {
        $this->rules[$key][] = "exists:$table".($column != null?",$column":'');
        return $this;
    }


    public function asEmail($key): ValidationTool
    {
        $this->rules[$key][] = "email";
        return $this;
    }

    public function asDate($key ='date'): ValidationTool
    {
        $this->rules[$key][] = "date";
        return $this;
    }
    public function asImage($key): ValidationTool
    {
        $this->rules[$key][] = "image";
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
