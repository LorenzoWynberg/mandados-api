<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CatalogElementController;
use App\Http\Controllers\DriverProfileController;
use App\Http\Controllers\HotelProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

// Public route for token creation
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return response()->json([
        'token' => $user->createToken($request->device_name)->plainTextToken,
    ]);
});

Route::get('/get-locale', function () {
    return response()->json(['locale' => app()->getLocale()]);
});

Route::post('/driver_profiles', [DriverProfileController::class, 'store']);
Route::post('/hotel_profiles', [HotelProfileController::class, 'store']);

// Group routes that require Sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sanctum/logout', function (Request $request) {
        /** @var \Laravel\Sanctum\PersonalAccessToken|null $token */
        $token = $request->user()?->currentAccessToken();
        $token?->delete();

        return response()->json(['message' => 'Logged out successfully']);
    });

    // User
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    // Profiles
    Route::apiResource('driver_profiles', DriverProfileController::class)->except('store');
    Route::apiResource('hotel_profiles', HotelProfileController::class)->except('store');

    // Catalogs
    Route::apiResource('catalogs', CatalogController::class);
    Route::apiResource('catalog-elements', CatalogElementController::class);
    Route::get('catalogs/{code}/elements', [CatalogElementController::class, 'getByCatalogCode']);
});
