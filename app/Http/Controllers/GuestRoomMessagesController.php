<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use App\GuestRoomMessages;
use App\RoomSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GuestRoomMessagesController extends Controller
{
    public function create_private_room_message(Request $request){
        $this->validate($request, [
            'file' => 'max:10240',
        ]);
        $new = new GuestRoomMessages();
        $new->room_number = $request->room_number;
        $new->title = $request->title;
        if ($request->hasFile('room_file')){
            $file = $request->file('room_file');
            $name = time().'.'. $file->getClientOriginalName();
            $destinationPath = public_path('/private_room_files');
            $file->move($destinationPath,$name);
            $new->file_name = $name;
        }
        $new->save();
        return redirect()->back()->withErrors($request->all());
    }
}
