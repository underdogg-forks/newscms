<?php

namespace App\Events\Auth;

use Illuminate\Queue\SerializesModels;
use App\Events\Event;

class Logout extends Event
{
    use SerializesModels;

    public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['auth'];
    }

    public function broadcastAs()
    {
        return 'logout';
    }
}
