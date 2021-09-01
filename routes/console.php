<?php

use App\Helpers\StorageHelper;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('worker:factory', function () {
    $w = \App\Models\Worker\Worker::factory()->count(1000)->create();
    dd($w);
});


Artisan::command('test', function () {
    $w = \App\Models\Common\City::factory()->count(20)->create();
    dd($w);


    // test3
//    $subject = 'idPhoto';
//    $filename = '/test.png';
//    dd(StorageHelper::buildPath(\App\Models\User\User::class,$subject,$filename));


    // test2
    dd(StorageHelper::foldersName(\App\Models\User\User::class, '/hi/lol.php'));

    // test1
    dd(Carbon::getDays(), Carbon::create('2021/07/23')->format('l'));

})->purpose('Display an test');
