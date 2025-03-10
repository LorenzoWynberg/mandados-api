<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HotelProfile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
