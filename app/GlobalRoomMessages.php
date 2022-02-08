<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GlobalRoomMessages extends Model
{
    protected $table="global";

    protected $guarded= [];

   /* public static function boot() {

        static::creating(function ($model) {
            if ($model->file_name){
                $link = env('APP_URL')."/f/". Str::random(20);
                $model->link = $link;
                $model->save();
            }
        });
    }*/
}
