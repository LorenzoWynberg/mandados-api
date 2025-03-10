<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DriverProfile;
use App\Http\Requests\StoreDriverProfileRequest;
use App\Http\Requests\UpdateDriverProfileRequest;

class DriverProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(DriverProfile::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(DriverProfile $driverProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverProfileRequest $request, DriverProfile $driver_profile)
    {
        $data = $request->validated();
        $driver_profile->updateWithUser($data);

        return response()->json([
            'user'    => $driver_profile->user,
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
