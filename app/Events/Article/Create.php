<?php

namespace NewsCMS\Events\Article;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use NewsCMS\Events\Event;

class Create extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $array = (object)$array;
        $this->details = $array;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['post'];
    }

    public function broadcastAs()
    {
        return 'created';
    }
}
