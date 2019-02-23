<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyarlarController extends Controller
{
    public function index(){
        return view('ayarlar.index');
    }
}
