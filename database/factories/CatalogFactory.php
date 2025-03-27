<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Catalog;

class CatalogFactory extends Factory
{
    protected $model = Catalog::class;

    public function definition(): array
    {
        // Generate localized translations for the name field
        $translations = [
            'en' => \Faker\Factory::create('en_US')->word(),
            'es' => \Faker\Factory::create('es_ES')->word(),
            'fr' => \Faker\Factory::create('fr_FR')->word(),
        ];

        return [
            'code' => Str::slug($translations['en']),
            'name' => $translations,
        ];
    }
}
