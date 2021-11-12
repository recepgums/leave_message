<?php

namespace App\Http\Controllers;

use App\Events\PrivateMessage;
use App\GuestRoomMessages;
use App\RoomSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Nexmo\Call\Event;

class RoomSettingsController extends Controller
{

    public function show_private_room(Request $request){
        $this->validate($request, [
            'room_number' => 'required|between:0,9999999999|integer',
        ]);
        $messages = GuestRoomMessages::postsOfRooms($request->room_number);
        $popular_rooms = \App\GuestRoomMessages::popularRooms();
        $temp = \App\GuestRoomMessages::emptyRooms();

//        event(new PrivateMessage($request->room_number));
        return view('private_room',['temp'=>$temp,'popular_rooms'=>$popular_rooms,'number'=>$request->room_number]);
    }
}
