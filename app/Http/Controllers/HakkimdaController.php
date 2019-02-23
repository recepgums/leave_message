<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HakkimdaController extends Controller
{
    public function ben(){
        $son=['a','b','c'];
            return view('hakkimda.hakkimda');
    }
}
