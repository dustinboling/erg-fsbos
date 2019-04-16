<?php

namespace App\Policies;

use App\User;
use App\Listing;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the listing.
     *
     * @param  \App\User  $user
     * @param  \App\Listing  $listing
     * @return mixed
     */
    public function view(User $user, Listing $listing)
    {
        if ($user->can('view listings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can create listings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create listings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the listing.
     *
     * @param  \App\User  $user
     * @param  \App\Listing  $listing
     * @return mixed
     */
    public function update(User $user, Listing $listing)
    {
        if ($user->can('update listings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the listing.
     *
     * @param  \App\User  $user
     * @param  \App\Listing  $listing
     * @return mixed
     */
    public function delete(User $user, Listing $listing)
    {
        if ($user->can('delete listings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the listing.
     *
     * @param  \App\User  $user
     * @param  \App\Listing  $listing
     * @return mixed
     */
    public function restore(User $user, Listing $listing)
    {
        if ($user->can('restore listings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the listing.
     *
     * @param  \App\User  $user
     * @param  \App\Listing  $listing
     * @return mixed
     */
    public function forceDelete(User $user, Listing $listing)
    {
        if ($user->can('forceDelete listings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any listings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->can('view listings')) {
            return true;
        }
    }
}
