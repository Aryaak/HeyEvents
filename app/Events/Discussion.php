<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Discussion implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $event_id;
    public $user_id;
    public $message;
    public $photo;
    public $name;
    public $status_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event_id, $user_id, $message, $photo, $name, $status_id)
    {
        $this->event_id = $event_id;
        $this->user_id = $user_id;
        $this->message = $message;
        $this->photo = $photo;
        $this->name = $name;
        $this->status_id = $status_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('discussion');
    }

    public function broadcastAs()
    {
        return 'discussion';
    }
}
