<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;
use App\Events\SendMessage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GlobalController extends Controller
{
    protected $url;


    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }


    public function get_file_with_link(Request $request, $file_link)
    {
        $link = "127.0.0.1:8000/l/" . $file_link;
        $link_data = Link::where('file_link', $link)->firstOrFail();
        $popular_rooms = \App\GuestRoomMessages::select('room_number')->groupBy('room_number')->orderByRaw('COUNT(*) DESC')->limit(4)->get();
        View::share('popular_rooms', $popular_rooms);
        $limit = 0;
        $temp = array();
        for ($i = 0; $i <= 999999999; $i++) {
            if ($limit >= 4) {
                break;
            }
            if (!\App\GuestRoomMessages::where('room_number', $i)->first()) {
                array_push($temp, $i);
                $limit += 1;
            }
        }
        View::share('temp', $temp);
        View::share('link_data', $link_data);

        return \view('welcome');
    }


    public function get_link(Request $request)
    {
        $new = new Link();
        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filenameWithExt = trim($filenameWithExt);
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/get_link', $fileNameToStore);
            $new->file_name = $fileNameToStore;
            $rndm_link = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(18 / strlen($x)))), 1, 18);
            $new->file_link = "127.0.0.1:8000/l/" . $rndm_link;
            $link = "127.0.0.1:8000/l/" . $rndm_link;
            $new->file_name = $fileNameToStore;
            $new->title = $request->title;
            if ($request->password) {
                $new->password = Hash::make($request->password);
            }

            $new->save();
            return response()->json(['link' => $link, 'state' => 'CA']);
        }
        dd("Only files can get a link!");
    }

    public function home_page()
    {
        $popular_rooms = \App\GuestRoomMessages::popularRooms();
        $temp = \App\GuestRoomMessages::emptyRooms();

        return view('welcome', ['temp' => $temp, 'popular_rooms' => $popular_rooms]);
    }

    public function ajax_password(Request $request)
    {
        $data = GlobalRoomMessages::find($request->id);
        if (password_verify($request->password, $data->password)) {
            return response()->json(['status' => 200, 'download_link' => $this->url->to($data->file_name)]);
        } else {
            return response()->json(['status' => 400, 'message' => "password incorrect"]);
        }
    }

    public function privateRoomMessages($number)
    {
        $texts = \App\GuestRoomMessages::where('room_number', $number)->where('file_name', null)->select(['id', 'title', 'created_at'])->orderBy('created_at', 'desc')->get();
        $files = \App\GuestRoomMessages::where('room_number', $number)->whereNotNull('file_name')->whereNotNull('password')->orderBy('created_at', 'desc')->select(['id', 'title', 'created_at'])->get();
        return response()->json(['status' => 200, 'texts' => $texts, 'files' => $files]);
    }


    public function destroy(Request $request)
    {
        $data = \App\GlobalRoomMessages::find($request->id);
        $data->delete();
        Storage::disk('s3')->delete('public/global_files/fry0mkpnMFfOR2CXzRh7s3FEF06Kj2qtv9IdAz1D.pdf');
        return response()->json(['status' => 200, "message" => "Success"]);
    }


    public function getFileByLink($link)
    {
        $file = GlobalRoomMessages::where('link', 'like', '%' . $link . '%')->firstOrFail();
        if ($file->user_id === null){
            $filename = $file->file_name;
            $fileContent = file_get_contents($filename);

            return response($fileContent, 200, [
                'Content-Type' => 'application/json',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            ]);
        }
        $popular_rooms = \App\GuestRoomMessages::popularRooms();
        $temp = \App\GuestRoomMessages::emptyRooms();
        $asd = "dsads";
        return \view('get_file_by_url', compact('file','temp', 'popular_rooms','asd'));
    }

    public function getFileByLinkCheck(Request $request)
    {
        $data = GlobalRoomMessages::findOrFail($request->file_id);

        if (!password_verify($request->password, $data->password)) {
            return response()->json(['message' => "password incorrect"], 400);
        }

        $filename = $data->file_name;
        $fileContent = file_get_contents($filename);

        return response($fileContent, 200, [
                'Content-Type' => 'application/json',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            ]);
    }

    public function create_global(Request $request)
    {
        $rules = array(
            'file' => 'max:3000000'
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['error' => $error->errors()->all()]);
        }
        $new = new GlobalRoomMessages();
        $new->title = $request->title;
        if ($request->hasFile('file')) {

            $uploadingS3 = $request->file('file')->store('public/global_files', 's3');
            $new->file_name = Storage::disk('s3')->url($uploadingS3);

            $link = env('APP_URL') . "/f/" . Str::random(20);
            $new->link = $link;
        }

        if ($request->password) {
            $new->password = Hash::make($request->password);
        }
        dd(auth('api')->id());
        if (auth('api')->check()){
            $new->user_id = auth('api')->id();
        }
        $new->save();
        event(new SendMessage());
        if ($request->json()) {
            return response()->json(['data' => $new]);
        }
        return redirect('/');
    }

    public function password($postId, Request $request)
    {

        $data = GlobalRoomMessages::find($postId);
        if (!$data) {
            return response()->json(['message' => "File couldn't find"], 404);
        }
        if (password_verify($request->password, $data->password)) {
            return response()->json(['download_link' => $this->url->to($data->file_name)], 200);
        } else {
            return response()->json(['message' => "password incorrect"], 400);
        }
    }

}
