<?php

namespace App\Listeners;

use App\Events\ContinentsUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetUpdatedContinents
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
     * @param  ContinentsUpdated  $event
     * @return void
     */
    public function handle(ContinentsUpdated $event)
    {
        //
    }
}
