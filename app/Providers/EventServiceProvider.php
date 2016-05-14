<?php

namespace NewsCMS\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Articles
        'NewsCMS\Events\Article\Create' => [
            'NewsCMS\Listeners\Article\CreateListener',
        ],
        'NewsCMS\Events\Article\Update' => [
            'NewsCMS\Listeners\Article\UpdateListener',
        ],
        'NewsCMS\Events\Article\Delete' => [
            'NewsCMS\Listeners\Article\DeleteListener',
        ],
        'NewsCMS\Events\Article\Publish' => [
            'NewsCMS\Listeners\Article\PublishListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
