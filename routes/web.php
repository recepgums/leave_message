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

Route::get('/', function () {
    $dizia=['a','b','c'];
    return view('welcome',[
        'dizi'=>$dizia,
        'yeni'=>'emin misin'
    ]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/eniyiler', 'HomeController@eniyiler')->name('homed');
Route::post('home/arama','HomeController@arama');

Route::group(["prefix"=>"panel","middleware"=>["auth"]],function (){

    Route::post('yeni_post_ekle','HomeController@postekle');
    Route::get('hakkimda','HakkimdaController@ben');
    Route::get('ajax_yeni_post_gir','HakkimdaController@ajax_yeni_post_gir');
    Route::get('ayarlar','AyarlarController@index');
    Route::post('ajax_puan_guncelle','HomeController@ajax_puan_guncelle');



});





