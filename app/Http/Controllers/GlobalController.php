<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;
use App\Events\SendMessage;
use Illuminate\Support\Facades\Validator;

class GlobalController extends Controller
{
    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function create_global(Request $request){
        $rules = array(
            'file'=>'max:10000'
        );
        $error = Validator::make($request->all(),$rules);

        if ($error->fails()){
            return response()->json(['error'=>$error->errors()->all()]);
        }

        $new = new GlobalRoomMessages;
        $new->title = $request->title;
        if ($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filenameWithExt = trim($filenameWithExt);
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
        event(new SendMessage());
        return redirect('/');
    }

    public function get_file_with_link(Request $request , $file_link){
        $link = "127.0.0.1:8000/l/".$file_link;
        $link_data = Link::where('file_link',$link)->firstOrFail();
        $popular_rooms = \App\GuestRoomMessages::select('room_number')->groupBy('room_number')->orderByRaw('COUNT(*) DESC') ->limit(4)->get();
        View::share('popular_rooms',$popular_rooms);
        $limit=0;
        $temp=array();
        for ($i=0; $i<=999999999;$i++){
            if ($limit>=4){
                break;
            }
            if (!\App\GuestRoomMessages::where('room_number',$i)->first() ){
                array_push($temp,$i);
                $limit+=1;
            }
        }
        View::share('temp',$temp);
        View::share('link_data',$link_data);

        return \view('welcome');
    }


    public function get_link(Request $request){
        $new = new Link();
        if ($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filenameWithExt = trim($filenameWithExt);
            $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/get_link',$fileNameToStore);
            $new->file_name = $fileNameToStore;
            $rndm_link = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(18/strlen($x)) )),1,18);
            $new->file_link =  "127.0.0.1:8000/l/".$rndm_link ;
            $link = "127.0.0.1:8000/l/".$rndm_link ;
            $new->file_name = $fileNameToStore ;
            $new->title = $request->title;
            if($request->password){
                $new->password =Hash::make($request->password);
            }

            $new->save();
            return response()->json(['link' => $link, 'state' => 'CA']);
        }
        dd("Only files can get a link!");
    }
    public function home_page(){
        $popular_rooms = \App\GuestRoomMessages::select('room_number')->groupBy('room_number')->orderByRaw('COUNT(*) DESC') ->limit(4)->get();
        View::share('popular_rooms',$popular_rooms);
        $limit=0;
        $temp=array();
        for ($i=0; $i<=999999999;$i++){
            if ($limit>=4){
                break;
            }
            if (!\App\GuestRoomMessages::where('room_number',$i)->first() ){
                array_push($temp,$i);
                $limit+=1;
            }
        }
        View::share('temp',$temp);
        return view('/welcome');
    }
    public function ajax_password(Request $request){
        $data = GlobalRoomMessages::find($request->id);
        if (password_verify($request->password, $data->password)) {
            return response()->json(['status'=>200,'download_link'=>$this->url->to('/storage/global_files/'.$data->file_name)]);
        }else{
            return response()->json(['status'=>400,'message'=>"password incorrect"]);
        }
    }



}
