<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\CatalogSeeder;
use Tests\TestCase;

class LocaleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CatalogSeeder::class);
    }

    public function test_default_locale_is_spanish(): void
    {
        $response = $this->withHeaders([
            'Accept-Language' => ''
        ])->getJson('/api/get-locale');

        $response->assertOk();
        $response->assertJson(['locale' => 'es']);
    }

    public function test_locale_accepts_language_header(): void
    {
        $response = $this->withHeaders([
            'Accept-Language' => 'fr',
        ])->getJson('/api/get-locale');

        $response->assertOk();
        $response->assertJson(['locale' => 'fr']);
    }
}
