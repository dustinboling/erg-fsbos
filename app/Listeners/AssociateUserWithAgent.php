<?php

namespace App\Listeners;

use App\Events\UserViewedListing;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssociateUserWithAgent
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
     * @param  UserViewedListing  $event
     * @return void
     */
    public function handle(UserViewedListing $event)
    {
        // if this is the first listing the user has viewed
        // the user will not be associated with an agent
        if(empty($event->user->agent))
        {
            // associate the user with the listing agent
            $event->user->agent()->associate($event->listing->agent);
            $event->user->save();
        }
    }
}
