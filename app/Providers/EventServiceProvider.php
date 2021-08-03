<?php

namespace App\Providers;

use App\Events\ContinentsUpdated;
use App\Events\CountriesUpdated;
use App\Events\ScreenAdded;

use App\Listeners\GetUpdatedContinents;
use App\Listeners\GetUpdatedCountries;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ScreenAdded::class => [
            GetUpdatedContinents::class,
            GetUpdatedCountries::class
        ]
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
}
