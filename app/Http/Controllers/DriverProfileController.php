<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\UpdateDriverProfileRequest;
use App\Http\Requests\StoreDriverProfileRequest;
use Illuminate\Routing\Controller;
use App\Models\DriverProfile;
use App\Models\User;

class DriverProfileController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        //$this->authorizeResource(DriverProfile::class, 'driver_profile');
        $this->middleware('auth:sanctum')->except('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(DriverProfile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverProfileRequest $request)
    {
        $data = $request->validated();
        $user = User::createAsDriver($data);

        return response()->json($user->driverProfile, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DriverProfile $driver_profile)
    {
        return response()->json($driver_profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverProfileRequest $request, DriverProfile $driver_profile)
    {
        $data = $request->validated();
        $driver_profile->updateWithUser($data);

        return response()->json([
            'user' => $driver_profile->user,
            'profile' => $driver_profile,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DriverProfile $driver_profile)
    {
        $driver_profile->update(['active' => false]);
        $driver_profile->delete();
        $driver_profile->user->update(['active' => false]);
        $driver_profile->user->delete();

        return response()->json(null, 204);
    }
}
