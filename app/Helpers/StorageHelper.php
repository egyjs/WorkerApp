<?php


namespace App\Helpers;


use App\Models\Worker\Worker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
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

    public static function filePath($model,UploadedFile $uploadedFile,$inputName,$prefix = ''):string
    {
        $inputName = Str::pluralStudly($inputName);
        return StorageHelper::foldersName($model,"$inputName/".($prefix != ''?$prefix.'-':uniqid()).time().'-'.$uploadedFile->getClientOriginalName());
    }


    /**
     * @param $model
     * @param UploadedFile $uploadedFile
     * @param string $inputName
     * @param string $prefix
     * @return string|\Exception
     */
    public static function saveAs($model, UploadedFile $uploadedFile, string $inputName, string $prefix = ''):string
    {
        try {
            $photoPath =  StorageHelper::filePath($model,$uploadedFile,$inputName,$prefix);
            Storage::disk('public')->put($photoPath, $uploadedFile->getContent());
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
