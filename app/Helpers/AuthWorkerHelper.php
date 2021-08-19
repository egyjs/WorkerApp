<?php


namespace App\Helpers;


use App\Models\Worker\Worker;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class AuthWorkerHelper
{
    /**
     * @param $worker_schedules
     * @param Worker|null $worker
     * @return array
     */
    public static function AvailableSchedulesDay(object $worker_schedules = null ,Worker $worker = null): array
    {
        if (!auth()->check() && $worker == null) return [];
        if ($worker == null) $worker = request()->user();


       if($worker_schedules == null) $worker_schedules = $worker->schedules()->select('day','active')->get(); // select('day','active') to make sql better

        $available = array_filter(Carbon::getDays(),function ($i)use($worker_schedules){
            return !$worker_schedules
//                ->where('active',true)
                ->where('day',$i)->first();
        });

        return array_values($available);
    }
}
