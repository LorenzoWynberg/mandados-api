<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HotelProfile;
use App\Models\User;

class HotelProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create()->each(function ($user) {
            HotelProfile::factory()->create(['user_id' => $user->id]);
        });
    }
}
