<?php

namespace App\Http\Controllers\Api;

use App\Paylasimlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function create_post(Request $request){
        $data = new Paylasimlar();
        $data->user_id = $request->user_id;
        $data->baslik = $request->baslik;
        $data->paylasim = $request->paylasim;

        $data->save();
        return response()->json(['data'=>$data],200);
    }


}
