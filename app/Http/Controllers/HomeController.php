<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

/*
        /*$paylasimlar = \App\Paylasimlar::where('id',1)->first();
        $paylasimlar->paylasim="asdasdasdasd";
        $paylasimlar->save();
        $paylasimbir = \App\Paylasimlar::where('id',1)->first();
        */
        $butun_paylasimlar = \App\Paylasimlar::orderBy('created_at','desc')->get();


        return view('home',compact('paylasimlar','butun_paylasimlar'));
    }

    public function eniyiler(){
        $eniyiler = \App\puanlar::groupBy('paylasimlars_id')->orderBy('toplam_puan','desc')->select(\DB::raw('sum(verilen_oy) as toplam_puan'),"paylasimlars_id")->get();
        $butun_paylasimlar = [];
        foreach ($eniyiler as $key_eniyi => $eniyi){
            $veri = \App\Paylasimlar::where('id',$eniyi->paylasimlars_id)->first();
            if(isset($veri)){
                $butun_paylasimlar[]=$veri;
            }
        }

        return view('home',compact('paylasimlar','butun_paylasimlar'));
    }
    public function postekle(Request $request){
        $this->validate(\request(),[
            'etiket'=>'required',
            'metin'=>'required'
        ]);
        $paylasimlar = new \App\Paylasimlar();
        $paylasimlar->user_id = Auth::user()->id;
        $paylasimlar->baslik = $request->etiket;
        $paylasimlar->paylasim = $request->metin;
        $paylasimlar->puan=0;
        $paylasimlar->save();
        return redirect()->back();
    }
    public function ajax_puan_guncelle(Request $request)
    {
        $verdigim_puan = \App\puanlar::where('users_id',Auth::user()->id)->where('paylasimlars_id',$request->id)->first();
        if(isset($verdigim_puan)){
            if ($request->islem=='1'){
                $verdigim_puan->verilen_oy=1;
            }else if($request->islem=='0'){
                $verdigim_puan->verilen_oy=-1;
            }
            $verdigim_puan->save();
        }else{
            $yeni_puan = new \App\puanlar();
            $yeni_puan->users_id = Auth::user()->id;
            $yeni_puan->paylasimlars_id = $request->id;
            if ($request->islem=='1'){
                $yeni_puan->verilen_oy = 1;
            }else if($request->islem=='0'){
                $yeni_puan->verilen_oy= -1;
            }
            $yeni_puan->save();
        }
        $puanlar = \App\puanlar::where('paylasimlars_id',$request->id)->get();
        $toplam_puan =0 ;
        foreach ($puanlar as $puan){
            $toplam_puan+=$puan->verilen_oy;
        }
        if($toplam_puan<0)$toplam_puan=0;
        return $toplam_puan;
    }
    public function arama(){
        $butun_paylasimlar=\App\Paylasimlar::where('baslik', 'like', '%' . Input::get('aranacak') . '%')->orWhere('paylasim', 'like', '%' . Input::get('aranacak') . '%')->get();
        return view('home',compact('paylasimlar','butun_paylasimlar'));

    }

}
