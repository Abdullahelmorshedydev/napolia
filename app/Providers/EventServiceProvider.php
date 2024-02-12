<?php

namespace App\Providers;

use App\Events\Site\SendInvoiceEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\Admin\ResetPasswordEvent;
use App\Listeners\SendInvoiceMailListener;
use App\Listeners\SendResetPasswordMailListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ResetPasswordEvent::class => [
            SendResetPasswordMailListener::class,
        ],

        SendInvoiceEvent::class => [
            SendInvoiceMailListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
