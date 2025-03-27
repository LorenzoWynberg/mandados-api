<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\CatalogSeeder;
use App\Models\CatalogElement;
use App\Models\User;
use Tests\TestCase;

class CreateHotelProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
        $this->seed(CatalogSeeder::class);
    }

    public function test_create_hotel_profile_and_assigns_hotel_role(): void
    {
        /** @var CatalogElement|null $randomSex */
        $randomSex = CatalogElement::whereHas('catalog', function ($query) {
            $query->where('code', 'sex');
        })->inRandomOrder()->first();

        $payload = [
            'name' => 'Hotel One',
            'email' => 'hotel1@example.com',
            'password' => 'secret123',
            'phone' => '+506 9876-5432',
            'avatar' => 'https://via.placeholder.com/150',
            'sex_id' => $randomSex?->id,
            'hotel_name' => 'Costa Rica Inn',
            'address' => '123 Main St',
            'city' => 'San José',
            'province' => 'San José',
            'country' => 'Costa Rica',
            'latitude' => 9.9281,
            'longitude' => -84.0907,
        ];

        $response = $this->postJson('/api/hotel_profiles', $payload);
        $response->assertStatus(201);

        // Retrieve the created user by email.
        $user = User::where('email', $payload['email'])->first();
        $this->assertNotNull($user);

        // Verify that the user has the 'hotel' role.
        $this->assertTrue($user->hasRole('hotel'));

        // Verify the associated hotel profile.
        $this->assertEquals('Costa Rica Inn', $user->hotelProfile->hotel_name);
    }
}
