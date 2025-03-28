<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelProfileRequest;
use App\Http\Requests\UpdateHotelProfileRequest;
use App\Models\HotelProfile;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class HotelProfileController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // $this->authorizeResource(HotelProfile::class, 'hotel_profile');
        $this->middleware('auth:sanctum')->except('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(HotelProfile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelProfileRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = User::createAsHotel($data);

        return response()->json($user->hotelProfile, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelProfile $hotel_profile): JsonResponse
    {
        return response()->json($hotel_profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelProfileRequest $request, HotelProfile $hotel_profile): JsonResponse
    {
        $data = $request->validated();
        $hotel_profile->updateWithUser($data);

        return response()->json([
            'user' => $hotel_profile->user,
            'profile' => $hotel_profile,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelProfile $hotel_profile): JsonResponse
    {
        $hotel_profile->update(['active' => false]);
        $hotel_profile->delete();
        $hotel_profile->user->update(['active' => false]);
        $hotel_profile->user->delete();

        return response()->json(null, 204);
    }
}
