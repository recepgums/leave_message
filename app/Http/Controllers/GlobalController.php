<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;

class GlobalController extends Controller
{
    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function create_global(Request $request){
        $new = new GlobalRoomMessages;
        $new->title = $request->title;
        if ($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/global_files',$fileNameToStore);
            $new->file_name = $fileNameToStore;
        }
        if($request->password){
           $new->password =Hash::make($request->password);
        }
        $new->save();
        return redirect('/');
    }

    public function home_page(){
        $all_messages = GlobalRoomMessages::orderBy('created_at','desc')->get();
        View::share('all_messages',$all_messages);
        return view('/welcome');
    }
    public function ajax_password(Request $request){
        $data = GlobalRoomMessages::find($request->id);
        if (password_verify($request->password, $data->password)) {
            return response()->json(['status'=>200,'download_link'=>$this->url->to('/storage/global_files/'.$data->file_name)]);
        }else{
            return "password is incorrect";
        }
    }

}
