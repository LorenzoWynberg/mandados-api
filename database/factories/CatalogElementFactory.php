<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CatalogElement;
use Illuminate\Support\Str;
use App\Models\Catalog;

class CatalogElementFactory extends Factory
{
    protected $model = CatalogElement::class;

    public function definition(): array
    {
        // Generate a base word in the default locale
        $baseWord = $this->faker->word();

        // Generate translations using specific locales
        $translations = [
            'en' => \Faker\Factory::create('en_US')->word(),
            'es' => \Faker\Factory::create('es_ES')->word(),
            'fr' => \Faker\Factory::create('fr_FR')->word(),
        ];

        return [
            'catalog_id' => Catalog::factory(),
            'code' => Str::slug($translations['en']),
            'name' => $translations,
            'meta' => [],
        ];
    }
}
