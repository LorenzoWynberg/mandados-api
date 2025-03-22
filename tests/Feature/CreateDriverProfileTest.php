<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateDriverProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_create_driver_profile_and_assigns_driver_role(): void
    {
        $payload = [
            'name'                 => 'Driver One',
            'email'                => 'driver1@example.com',
            'password'             => 'secret123',
            'phone'                => '+506 1234-5678',
            'avatar'               => 'https://via.placeholder.com/150',
            'sex'                  => 'male',
            'license_number'       => '1-2345-6789',
            'license_plate_number' => 'ABC-123',
            'license_photo_front'  => 'https://via.placeholder.com/640x480?text=Front',
            'license_photo_back'   => 'https://via.placeholder.com/640x480?text=Back',
            'date_of_birth'        => '1990-01-01',
        ];

        $response = $this->postJson('/api/driver_profiles', $payload);
        $response->assertStatus(201);

        // Retrieve the created user by email.
        $user = User::where('email', $payload['email'])->first();
        $this->assertNotNull($user);

        // Verify that the user has the 'driver' role.
        $this->assertTrue($user->hasRole('driver'));

        // Verify the associated driver profile.
        $this->assertEquals('1-2345-6789', $user->driverProfile->license_number);
    }
}