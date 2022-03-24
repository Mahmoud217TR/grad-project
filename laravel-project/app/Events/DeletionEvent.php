<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeletionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user, $object, $object_type, $datetime;
    
    public function __construct($object, $object_type, $user)
    {
        $this->object = $object;
        $this->object_type = $object_type;
        $this->user = $user;
        $this->datetime = now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
