<?php

Route::get('/', 'GlobalController@home_page')->name('home-page');
Route::view('/start', 'start')->name('start-page');
Route::get('/test', 'TestController');

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
Route::get('/p','RoomSettingsController@show_private_room')->name('show_private_room');
Route::post('/private_room_create/{room_number}','GuestRoomMessagesController@create_private_room_message')->name('create_private_room_message');

Route::post('ajaxdeneme','GlobalController@ajax_password')->name('ajax_password');
Route::post('ajaxprivate','GuestRoomMessagesController@ajax_private')->name('ajax_private');

Route::post('/get_link','GlobalController@get_link');
Route::get('/l/{file_link}','GlobalController@get_file_with_link');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
