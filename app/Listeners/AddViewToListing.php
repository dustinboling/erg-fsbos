<?php

namespace App\Listeners;

use App\View;
use App\Events\UserViewedListing;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddViewToListing
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
        $user = $event->user;
        $listing = $event->listing;
        $listingClass = get_class($event->listing); // eg. App\Listing

        // check if the user has already viewed this listing
        $view = View::where([
                    ['user_id', $user->id],
                    ['viewable_id', $listing->id],
                    ['viewable_type', $listingClass],
                ])->first();

        if($view)
        {
            // if user has viewed this listing before,
            // increment the user view count on the existing view record
            $view->user_views = $view->user_views + 1;
            $view->save();
        }
        else
        {
            // create a new view record
            $view = $user->views()->create([
                'viewable_id'   => $event->listing->id,
                'viewable_type' => $listingClass,
                'user_views'    => 1,
            ]);
        }
    }
}
