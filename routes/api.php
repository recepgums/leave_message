<?php

use App\GuestRoomMessages;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/deneme',function (){
    return \App\User::all()->toJson();
});
Route::get('/survey', function (){
    $data = \App\GlobalQuestions::all();
   return response()->json(['status'=>200,'data'=>$data]);
});
Route::get('/private_room/{number}',function ($number){
    $data = \App\GuestRoomMessages::where('room_number',$number)->orderBy('created_at','desc')->get();
    return $data;
});
Route::get('/',function (){
    $data = \App\GlobalRoomMessages::orderBy('created_at','desc')->limit(4)->get();
    return $data;
});
