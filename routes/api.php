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
Route::get('/', 'FollowController@index');
Route::post('/removeFile',function (Request $request){
    $data = \App\GlobalRoomMessages::find($request->id);
//    unlink(storage_path('app/public/global_files/'.$data->file_name));
//    \Illuminate\Support\Facades\Storage::delete($data->file_name);
    $data->delete();
   Storage::disk('s3')->delete('public/global_files/fry0mkpnMFfOR2CXzRh7s3FEF06Kj2qtv9IdAz1D.pdf');
   return response()->json(['status'=>200,"message"=>"Success"]);
});
