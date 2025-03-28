<?php

namespace App\Policies;

use App\Models\DriverProfile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverProfilePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, DriverProfile $driverProfile): bool
    {
        return $user->id === $driverProfile->user_id || $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, DriverProfile $driverProfile): bool
    {
        return $user->id === $driverProfile->user_id || $user->hasRole('admin');
    }

    public function delete(User $user, DriverProfile $driverProfile): bool
    {
        return $user->id === $driverProfile->user_id || $user->hasRole('admin');
    }

    public function restore(User $user, DriverProfile $driverProfile): bool
    {
        return $user->id === $driverProfile->user_id || $user->hasRole('admin');
    }

    public function forceDelete(User $user, DriverProfile $driverProfile): bool
    {
        return $user->hasRole('admin');
    }
}
