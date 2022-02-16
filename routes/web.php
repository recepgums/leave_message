<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', 'GlobalController@home_page')->name('home-page');
Route::get('/seeder', function (){
    $sql = public_path('anonym_upload.sql');

    $db = [
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'host' => env('DB_HOST'),
        'database' => env('DB_DATABASE')
    ];

    exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sql");

    \Log::info('SQL Import Done');
});
Route::get('/f/{link}', 'GlobalController@getFileByLink');
Route::post('/f/download', 'GlobalController@getFileByLinkCheck')->name('download_file_attempt');
Route::view('/start', 'start')->name('start-page');
Route::get('/test', 'TestController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/eniyiler', 'HomeController@eniyiler')->name('homed');
Route::post('home/arama','HomeController@arama');

Route::group(["prefix"=>"panel","middleware"=>["auth"]],function (){
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
