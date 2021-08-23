<?php

namespace App\Helpers;

use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DBHelpers
{

    public static function client_distance_raw($client, $basedOn = 'city', $latColumnName = 'lat', $lngColumnName = 'lng', $AS='city_distance'): Expression
    {

        $tableBased = Str::pluralStudly($basedOn);
        $modelBased = $client->{Str::singular($basedOn)};

        $lat = $modelBased->$latColumnName;
        $lng = $modelBased->$lngColumnName;

        return DB::raw(' ( 6371 * acos( cos( radians(' . $lat . ') ) *
        cos( radians( '.$tableBased.'.lat  ) ) * cos( radians(  '.$tableBased.'.lng ) - radians(' . $lng . ') ) +
        sin( radians(' . $lat . ') ) *
        sin( radians(  '.$tableBased.'.lat ) ) ) )  AS '. $AS);
    }

    public static function average_worker_price_raw($AS = 'average_worker_price'): Expression
    {
        return DB::raw("((worker_jobs.price_range_from + worker_jobs.price_range_to) / 2)  as $AS");
    }


    public static function worker_available_time_raw($student_time_from=null,$student_time_to=null,$teacher_time_from=null,$teacher_time_to=null, $AS = 'worker_available_time'): Expression
    {
        if ($student_time_from == null || $student_time_to == null){
            return DB::raw('');
        }
        // $u = user = student
        // $w = worker = teacher
        $uFrom = $student_time_from;
        $uTo = $student_time_to;
        $wFrom = $teacher_time_from;
        $wTo = $teacher_time_to;


        return DB::raw("(CASE
                                    WHEN ($uFrom <= $wFrom && $uTo >= $wTo) THEN ($wTo - $wFrom)
                                    WHEN ($uFrom >= $wFrom && $uTo <= $wTo) THEN ($uTo - $uFrom)
                                    WHEN ($uFrom <= $wFrom && $uTo <= $wTo) THEN ($uTo - $wFrom)
                                    WHEN ($uFrom >= $wFrom && $uTo >= $wTo) THEN ($wTo - $uFrom)
                                    ELSE 0
                                END) AS worker_available_time
                                ");
    }
}
