<?php

namespace App\Events;

use App\GuestRoomMessages;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class PrivateMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public  $room_number;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $room_number)
    {
        $this->room_number = $room_number;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('room-channel.'.$this->room_number);
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'RoomEvent';
    }
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastWith()
    {
        $all_messages = GuestRoomMessages::where('room_number',$this->room_number)->orderBy('created_at','desc')->get();
        return [
            'data' => $all_messages
        ];
    }
}
