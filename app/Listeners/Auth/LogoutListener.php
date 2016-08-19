<?php

namespace NewsCMS\Listeners\Auth;

use NewsCMS\Events\Auth\Logout;

class LogoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout $event
     * @return boolean
     */
    public function handle(Logout $event)
    {
        return true;
    }
}
