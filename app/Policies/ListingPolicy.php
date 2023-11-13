<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{

    public function before(?User $user, $ability)
    {
        if($user?->is_admin /* && $ability === 'update' -- if need set for specify method*/)
        {
            return true;
        }
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Listing $listing): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Listing $listing): bool
    {
        return $user->id === $listing->user_id;
    }

    public function delete(User $user, Listing $listing): bool
    {
        return $user->id === $listing->user_id;
    }

    public function restore(User $user, Listing $listing): bool
    {
        return $user->id === $listing->user_id;
    }

    public function forceDelete(User $user, Listing $listing): bool
    {
        return $user->id === $listing->user_id;
    }
}
