<?php


namespace App\Helpers;


use App\Models\Worker\Worker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class StorageHelper
{

    public static function ltrimSlash($string){
        return Str::startsWith($string,'/') ? ltrim($string, '/') :$string; // remove begging `slash /` if exist
    }

    public static function foldersName($model,$path = ''): string
    {
        $path = StorageHelper::ltrimSlash($path); // remove begging `slash /` if exist
        return ''.((new $model)->getTable()).'/'.$path;
    }

    public static function filePath($model,$request,$inputName,$prefix = ''):string
    {
        return StorageHelper::foldersName($model,"$inputName/".($prefix != ''?$prefix.'-':uniqid()).time().'-'.$request->file($inputName)->getClientOriginalName());
    }


    public static function saveAs($model,$request,$inputName,$prefix = ''):string
    {
        try {
            $photoPath =  StorageHelper::filePath($model,$request,$inputName,$prefix);
            Storage::disk('public')->put($photoPath, $request->file($inputName)->getContent());
            return $photoPath;
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

    }

    public static function buildPath($model,$subject,$path): string
    {
        $subject = Str::snake(Str::pluralStudly(class_basename($subject)));
        $model = StorageHelper::foldersName($model,$subject);
        $path = StorageHelper::ltrimSlash($path); // remove begging `slash /` if exist
        return storage_path("$model/$path");
    }


}
