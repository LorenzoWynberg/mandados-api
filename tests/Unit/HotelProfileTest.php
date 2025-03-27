<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\HotelProfile;
use App\Models\User;
use Tests\TestCase;

class HotelProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_hotel_profile_belongs_to_user(): void
    {
        $user = User::factory()->create();
        $profile = HotelProfile::factory()->create([
            'user_id' => $user->id,
            'hotel_name' => 'Costa Rica Inn',
            'city' => 'San José',
            'province' => 'San José',
            'latitude' => 9.9281,
            'longitude' => -84.0907,
        ]);

        $this->assertEquals($user->id, $profile->user->id);
    }

    public function test_hotel_profile_soft_deletes(): void
    {
        $user = User::factory()->create();
        $profile = HotelProfile::factory()->create(['user_id' => $user->id]);

        $profile->delete();
        $this->assertTrue($profile->trashed());

        $user->delete();
        $this->assertTrue($user->trashed());
    }
}
