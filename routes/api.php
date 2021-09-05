<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Twilio\TwiML\VoiceResponse;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('twiml/say',function(Request $request){


    $response = new VoiceResponse();
    $response->say(base64_decode($request->say));

    return response($response, 200, [
        'Content-Type' => 'application/xml'
    ]);
})->middleware('auth')->name('twiml.say');
