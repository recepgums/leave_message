<?php

use App\GuestRoomMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login')->name('login');

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/me', 'Api\AuthController@me');
    Route::get('/my-posts', 'FollowController@myPosts');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/survey', function (){
    $data = \App\GlobalQuestions::all();
   return response()->json(['status'=>200,'data'=>$data]);
});
Route::get('/private_room/{number}','GlobalController@privateRoomMessages');
Route::post('/', 'GlobalController@create_global');
Route::get('/', 'FollowController@index');
Route::get('/get/{id}', 'FollowController@detail');
Route::post('/removeFile','GlobalController@destroy');
Route::post('/private-remove-file','GuestRoomMessagesController@destroy');
Route::post('/{post}/password', 'GlobalController@password');
