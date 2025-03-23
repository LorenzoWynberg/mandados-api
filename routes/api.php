<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\HotelProfileController;
use App\Http\Controllers\DriverProfileController;

// Public route for token creation
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email'       => 'required|email',
        'password'    => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return response()->json([
        'token' => $user->createToken($request->device_name)->plainTextToken,
    ]);
});

// Group routes that require Sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sanctum/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });

    // User
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    // Profiles
    Route::apiResource('driver_profiles', DriverProfileController::class);
    Route::apiResource('hotel_profiles', HotelProfileController::class);
});