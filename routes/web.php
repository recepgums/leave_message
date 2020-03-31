<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GlobalController@home_page');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/eniyiler', 'HomeController@eniyiler')->name('homed');
Route::post('home/arama','HomeController@arama');

Route::group(["prefix"=>"panel","middleware"=>["auth"]],function (){
    Route::post('yeni_post_ekle','HomeController@postekle')->name('yeni_post_ekle');
    Route::get('hakkimda','HakkimdaController@ben');
    Route::get('ajax_yeni_post_gir','HakkimdaController@ajax_yeni_post_gir');
    Route::get('ayarlar','AyarlarController@index');
    Route::post('ajax_puan_guncelle','HomeController@ajax_puan_guncelle');
});
Route::post('/create_global','GlobalController@create_global')->name('create_global');
Route::get('/private_room','RoomSettingsController@show_private_room')->name('show_private_room');
Route::post('/private_room_create/{room_number}','GuestRoomMessagesController@create_private_room_message')->name('create_private_room_message');




