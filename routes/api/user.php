<?php

use App\Http\Controllers\API\User\AuthController;
use App\Http\Controllers\API\User\IssueController;
use Illuminate\Http\Request;
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

// graphql
Route::any('graphql',[\App\Http\Controllers\API\User\GraphqlController::class,'graphql']);


// auth
Route::group(['prefix'=>'auth'],function (){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::group(['middleware' => ['auth:users','scopes:users'] ],function(){
    // auth
    Route::group(['prefix'=>'auth'],function (){
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user',[AuthController::class, 'user']);
    });

    Route::post('assign_address', [AuthController::class, 'assignAddress']);
    Route::resource('issues', IssueController::class);
});
