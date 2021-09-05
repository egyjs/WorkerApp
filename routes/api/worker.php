<?php

use App\Http\Controllers\API\Worker\AuthController;
use App\Http\Controllers\API\Worker\IssueController;
use App\Http\Controllers\API\Worker\WorkerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// auth
Route::group(['prefix'=>'auth'],function (){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => ['auth:workers','scopes:workers'] ],function(){
    // auth
    Route::group(['prefix'=>'auth'],function (){
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('worker',[WorkerController::class, 'worker']);
    });

    // assign_jobs
    Route::post('assign_jobs',[WorkerController::class, 'assignJobs']);
    Route::post('assign_schedule',[WorkerController::class, 'assignSchedule']);

    Route::post('issues/reject',[IssueController::class, 'issuesReject']);
//    Route::post('issue/accept',[IssueController::class, 'issueAccept'])
    Route::post('issues/more_info',[IssueController::class, 'issuesInfo']);
});
