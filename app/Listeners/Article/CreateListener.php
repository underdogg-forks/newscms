<?php

namespace App\Listeners\Article;

use App\Events\Article\Create;
use App\Events\Article\Publish;
use App\Posts;

class CreateListener
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
     * @param  Create $event
     * @return void
     */
    public function handle(Create $event)
    {
        $event = $event->details;
        $special = [];
        if ($event->slug != null) {
            $special['slug'] = $event->slug;
        } else {
            $special['slug'] = str_slug($event->title);
        }
        $post = Posts::create([
            'title' => $event->title,
            'content' => $event->title,
            'header_image' => $event->event_image,
            'slug' => $special['slug']
        ]);
        if ($event->publish) {
            event(new Publish($post->id));
        }
    }
}
