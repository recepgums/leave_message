<?php

namespace App\Http\Controllers;

use App\GlobalRoomMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function index(Request $request)
    {
        $texts = GlobalRoomMessages::where('file_name',null)->select(['id','title','created_at'])->orderBy('created_at','desc')->get();
        $files = GlobalRoomMessages::whereNotNull('file_name')->whereNotNull('password')->orderBy('created_at','desc')->select(['id','title','created_at'])->get();
        return response()->json(['status'=>200,'texts'=>$texts,'files'=>$files]);
    }

    public function detail($id)
    {
        return GlobalRoomMessages::findOrFail($id);
    }
}
