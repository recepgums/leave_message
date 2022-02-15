<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function index(Request $request)
    {
        $texts = GlobalRoomMessages::where('user_id',null)->where('file_name',null)->select(['id','title','created_at'])->orderBy('created_at','desc')->get();
        $youtube = GlobalRoomMessages::where('user_id',null)->where('file_name',null)->where('title','like','%youtube.com%')->select(['id','title','created_at'])->orderBy('created_at','desc')->get();
        $files = GlobalRoomMessages::where('user_id',null)->whereNotNull('file_name')->whereNotNull('password')->orderBy('created_at','desc')->select(['id','title','created_at','link'])->get();
        return response()->json(['status'=>200,'texts'=>$texts,'files'=>$files,'youtube'=>$youtube]);
    }

    public function detail($id)
    {
        return GlobalRoomMessages::findOrFail($id);
    }

    public function myPosts(Request $request)
    {
        $texts = GlobalRoomMessages::where('user_id',auth('api')->id())->where('file_name',null)->select(['id','title','created_at'])->orderBy('created_at','desc')->get();
        $youtube = GlobalRoomMessages::where('user_id',auth('api')->id())->where('file_name',null)->where('title','like','%youtube.com%')->select(['id','title','created_at'])->orderBy('created_at','desc')->get();
        $files = GlobalRoomMessages::where('user_id',auth('api')->id())->whereNotNull('file_name')->whereNotNull('password')->orderBy('created_at','desc')->select(['id','title','created_at','link'])->get();

        return response()->json(['status'=>200,'texts'=>$texts,'files'=>$files,'youtube'=>$youtube]);
    }
}
