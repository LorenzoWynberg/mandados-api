<?php

namespace Database\Seeders;

use App\Models\CatalogElement;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /** @var CatalogElement|null $maleSex */
        $maleSex = CatalogElement::where('code', 'male')->first();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'sex_id' => $maleSex?->id,
            'lang_code' => 'es',
        ]);
    }
}
