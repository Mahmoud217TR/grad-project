<?php

namespace App\Providers;

use App\Events\DeletionEvent;
use App\Events\GeneralLogEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Events\RoleChangeEvent;
use App\Events\UserRelatedEvent;
use App\Listeners\LogListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        GeneralLogEvent::class =>[
            [LogListener::class, 'general'],
        ],
        RoleChangeEvent::class =>[
            [LogListener::class, 'roleChange'],
        ],
        InsertionEvent::class =>[
            [LogListener::class, 'insertion'],
        ],
        ModificationEvent::class =>[
            [LogListener::class, 'modification'],
        ],
        DeletionEvent::class =>[
            [LogListener::class, 'deletion'],
        ],
        UserRelatedEvent::class =>[
            [LogListener::class, 'userRelated'],
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
