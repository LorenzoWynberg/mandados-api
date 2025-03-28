<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverProfileRequest;
use App\Http\Requests\UpdateDriverProfileRequest;
use App\Models\DriverProfile;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class DriverProfileController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // $this->authorizeResource(DriverProfile::class, 'driver_profile');
        $this->middleware('auth:sanctum')->except('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(DriverProfile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverProfileRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = User::createAsDriver($data);

        return response()->json($user->driverProfile, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DriverProfile $driver_profile): JsonResponse
    {
        return response()->json($driver_profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverProfileRequest $request, DriverProfile $driver_profile): JsonResponse
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
    public function destroy(DriverProfile $driver_profile): JsonResponse
    {
        $driver_profile->update(['active' => false]);
        $driver_profile->delete();
        $driver_profile->user->update(['active' => false]);
        $driver_profile->user->delete();

        return response()->json(null, 204);
    }
}
