<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class WorkshopholderGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email = null;
    public $password = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $email, String $password)
    {
        $this->email = $email;
        $this->password = $password;
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
