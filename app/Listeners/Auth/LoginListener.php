<?php

namespace NewsCMS\Listeners\Auth;

use NewsCMS\Events\Auth\Login;

class LoginListener
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
     * @param  Login $event
     * @return boolean
     */
    public function handle(Login $event)
    {
        try {
            \Sentinel::authenticate((array)$event->credentials);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
