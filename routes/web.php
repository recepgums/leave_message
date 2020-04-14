<?php

use Illuminate\Http\Request;

Route::get('/', 'GlobalController@home_page');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/eniyiler', 'HomeController@eniyiler')->name('homed');
Route::post('home/arama','HomeController@arama');

Route::group(["prefix"=>"panel","middleware"=>["auth"]],function (){
    Route::post('yeni_post_ekle','HomeController@postekle')->name('yeni_post_ekle');
    Route::get('ajax_yeni_post_gir','HakkimdaController@ajax_yeni_post_gir');
    Route::post('ajax_puan_guncelle','HomeController@ajax_puan_guncelle');
});
Route::post('/create_global','GlobalController@create_global')->name('create_global');
Route::post('/global_password_check/{message_id}','GlobalController@global_password_check')->name('global_password_check');
Route::get('/private_room','RoomSettingsController@show_private_room')->name('show_private_room');
Route::post('/private_room_create/{room_number}','GuestRoomMessagesController@create_private_room_message')->name('create_private_room_message');

Route::post('ajaxdeneme','GlobalController@ajax_password')->name('ajax_password');
Route::post('ajaxprivate','GuestRoomMessagesController@ajax_private')->name('ajax_private');

Route::get('test', function(){
    broadcast(new \App\Events\SendMessage);
});
Route::get('/t', function () {
    event(new \App\Events\SendMessage());
    dd('Event Run Successfully.');
});
Route::get('add-notification', function() {
    broadcast(new \App\Events\SendMessage);
    return 'Bildirim Gönderildi.';
});

Route::post('create_survey',function (Request $request){
    $data = new \App\GlobalQuestions();
    $data->question_title = $request->question_title;
    $data->option_one = $request->answer;
    $data->option_two = $request->option_2;
    $data->option_three = $request->option_3;
    $data->option_four = $request->option_4;
    $data->correct_answer = $request->answer;
    $data->save();
    return redirect()->back();
})->name('create_survey');
