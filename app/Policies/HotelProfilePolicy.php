<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\HotelProfile;
use App\Models\User;

class HotelProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HotelProfile $hotelProfile): bool
    {
        return $user->id === $hotelProfile->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HotelProfile $hotelProfile): bool
    {
        return $user->id === $hotelProfile->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HotelProfile $hotelProfile): bool
    {
        return $user->id === $hotelProfile->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HotelProfile $hotelProfile): bool
    {
        return $user->id === $hotelProfile->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HotelProfile $hotelProfile): bool
    {
        return $user->hasRole('admin');
    }
}
