<?php

namespace Database\Seeders;

use App\Models\DriverProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DriverProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create driver profiles for 5 users.
        User::factory()->count(5)->create()->each(function ($user) {
            DriverProfile::factory()->create(['user_id' => $user->id]);
        });
    }
}
