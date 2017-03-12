<?php

namespace App\Events\Article;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use App\Events\Event;

class Publish extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['article'];
    }

    /**
     * Get the event name
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'published';
    }
}
