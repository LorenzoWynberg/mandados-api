<?php

namespace Tests\Unit;

use App\Models\DriverProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DriverProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_driver_profile_belongs_to_user(): void
    {
        $user = User::factory()->create();
        $profile = DriverProfile::factory()->create([
            'user_id' => $user->id,
            'license_number' => '1-2345-6789',
            'license_plate_number' => 'ABC-123',
            'date_of_birth' => '1990-01-01',
        ]);

        $this->assertEquals($user->id, $profile->user->id);
    }

    public function test_driver_profile_soft_deletes(): void
    {
        $user = User::factory()->create();
        $profile = DriverProfile::factory()->create(['user_id' => $user->id]);

        $profile->delete();
        $this->assertTrue($profile->trashed());

        $user->delete();
        $this->assertTrue($user->trashed());
    }
}