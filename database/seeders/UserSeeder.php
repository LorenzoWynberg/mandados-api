<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name'  => 'Testing User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'phone' => '+506 1234-5678',
            'sex' => 'male',
        ]);
    }
}
