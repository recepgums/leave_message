<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestRoomMessages extends Model
{
    protected $table="guest_room_messages";

    public static function postsOfRooms(int $roomId)
    {
        if(!RoomSetting::where('room_number',$roomId)->first()){
            $new = new RoomSetting();
            $new->room_number = $roomId;
            $new->save();
        }
        return self::where('room_number',$roomId)->orderBy('created_at','desc')->get();
    }

    public function scopePopularRooms()
    {
        return $this->select('room_number')->groupBy('room_number')->orderByRaw('COUNT(*) DESC') ->limit(4)->get();
    }

    public function scopeEmptyRooms()
    {
        $limit=0;
        $temp=array();
        for ($i=0; $i<=999999999;$i++){
            if ($limit>=4){break;}
            if (!$this->where('room_number',$i)->first() ){
                array_push($temp,$i);
                $limit+=1;
            }
        }
        return $temp;
    }

}
