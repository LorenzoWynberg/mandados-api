<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HotelProfile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHotelProfileRequest;
use App\Http\Requests\UpdateHotelProfileRequest;

class HotelProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(HotelProfile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelProfileRequest $request)
    {
        $data = $request->validated();
        $user = User::createAsHotel($data);
        return response()->json($user->hotelProfile, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelProfile $hotel_profile)
    {
        return response()->json($hotel_profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelProfileRequest $request, HotelProfile $hotel_profile)
    {
        $data = $request->validated();
        $hotel_profile->updateWithUser($data);

        return response()->json([
            'user'    => $hotel_profile->user,
            'profile' => $hotel_profile,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelProfile $hotel_profile)
    {
        $hotel_profile->update(['active' => false]);
        $hotel_profile->delete();
        $hotel_profile->user->update(['active' => false]);
        $hotel_profile->user->delete();

        return response()->json(null, 204);
    }
}
