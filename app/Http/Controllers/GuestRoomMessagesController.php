<?php

namespace App\Http\Controllers;

use App\Events\PrivateMessage;
use App\GlobalRoomMessages;
use App\GuestRoomMessages;
use App\RoomSetting;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class GuestRoomMessagesController extends Controller
{
    private $url;
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function create_private_room_message(Request $request,$roomId){
        $this->validate($request, [
            'file' => 'max:10240',
        ]);
        $new = new GuestRoomMessages();
        $new->room_number = $roomId;
        $new->title = $request->title;
        if ($request->hasFile('file')){
            $uploadingS3 = $request->file('file')->store('public/global_files','s3');
            $new->file_name = Storage::disk('s3')->url($uploadingS3);
        }
        if($request->password){
            $new->password =Hash::make($request->password);
        }
        $new->save();
        event(new PrivateMessage($request->room_number));


        return redirect()->back()->withErrors($request->all());
    }
    public function ajax_private(Request $request){
        $data = GuestRoomMessages::find($request->id);
        if (password_verify($request->password, $data->password)) {
            return response()->json(['status'=>200,'download_link'=>$this->url->to($data->file_name)]);
        }else{
            return response()->json(['status'=>400,'message'=>"password incorrect"]);
        }
    }

    public function destroy(Request $request)
    {
        $data = \App\GuestRoomMessages::find($request->id);
        $data->delete();
        Storage::disk('s3')->delete('public/global_files/fry0mkpnMFfOR2CXzRh7s3FEF06Kj2qtv9IdAz1D.pdf');
        return response()->json(['status'=>200,"message"=>"Success"]);
    }
}
