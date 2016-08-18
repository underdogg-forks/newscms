<?php

namespace NewsCMS\Events\Auth;

use Illuminate\Queue\SerializesModels;
use NewsCMS\Events\Event;

class Login extends Event
{
    use SerializesModels;

    public $credentials;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $array = (object)$array;
        $this->credentials = $array;
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

    /**
     * Get the event name for the broadcast
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'login';
    }
}
