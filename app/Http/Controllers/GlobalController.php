<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GlobalController extends Controller
{
    public function create_global(Request $request){
        $new = new GlobalRoomMessages;
        $new->title = $request->title;
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'. $file->getClientOriginalName();
            $destinationPath = public_path('../storage/global_files');
            $file->move($destinationPath,$name);
            $new->file_name = $name;
        }
        $new->save();
        return redirect('/');
    }

    public function home_page(){
        $all_messages = GlobalRoomMessages::orderBy('created_at','desc')->get();
        View::share('all_messages',$all_messages);
        return view('/welcome');
    }

}
