<?php

namespace Database\Seeders;

use App\Models\HotelProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

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
