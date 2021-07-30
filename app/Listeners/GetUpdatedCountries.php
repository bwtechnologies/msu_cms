<?php

namespace App\Listeners;

use App\Events\CountriesUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetUpdatedCountries
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
     * @param  CountriesUpdated  $event
     * @return void
     */
    public function handle(CountriesUpdated $event)
    {
        //
    }
}
