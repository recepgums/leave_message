<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::get('/', 'GlobalController@home_page')->name('home-page');
Route::get('/seeder', function (){
    for ($x = 0; $x <= 10; $x++) {
        $fileArray = [
            'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/tltUFJx4915wdCaG1D9J1O1bjJMml13XRpF0nUiD.jpg',
            'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/35OqBiMBMUhuIqt1Tjxxji1ffc1xlneoMvLeTXwL.zip',
            'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ENCAqOQqszceXsRLDJZgkCs7oFEeQ3YcKwwfkLJf.png',
            'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/XpVeohUVa1PkSHBbcRkgI214XJI8c49mNldTnThK.txt',
            'https://anonymupload-mmgmf.s3.eu-west-3.amazonaws.com/public/global_files/ftLl55rLfG0nZVL34rdKdyZfxs3x8un5Z4di0SRL.txt'
        ];
        $rand =random_int(0,1);
        \App\GlobalRoomMessages::create([
            'title' => 'Test '. random_int(100,1000),
            'file_name' => $rand ?  array_rand($fileArray) : null,
            'password' => $rand ? Hash::make('12345678') : null,
            'user_id' => $rand ? 1: null,
            'link' => env('APP_URL') . "/f/" . Str::random(20)
        ]);
    }
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
