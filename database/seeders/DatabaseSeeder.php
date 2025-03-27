<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CatalogSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            HotelProfileSeeder::class,
            DriverProfileSeeder::class,
        ]);
    }
}
