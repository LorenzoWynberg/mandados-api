<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\CatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SetUserLanguageMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CatalogSeeder::class);
    }

    public function test_default_locale_is_spanish(): void
    {
        $response = $this->getJson('/api/get-locale', [
            'Accept-Language' => '',
        ]);
        $response->assertOk();
        $response->assertJson(['locale' => 'es']);
    }

    public function test_invalid_language_header_falls_back_to_spanish(): void
    {
        $response = $this->withHeaders([
            'Accept-Language' => 'de',
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

    public function test_authenticated_user_lang_code_takes_precedence(): void
    {
        $user = User::factory()->create(['lang_code' => 'fr']);
        $this->actingAs($user);

        $response = $this->withHeaders([
            'Accept-Language' => 'es',
        ])->getJson('/api/get-locale');

        $response->assertOk();
        $response->assertJson(['locale' => 'fr']);
    }

    public function test_authenticated_user_with_invalid_lang_code_falls_back(): void
    {
        $user = User::factory()->create(['lang_code' => 'ru']);
        $this->actingAs($user);

        $response = $this->getJson('/api/get-locale', [
            'Accept-Language' => '',
        ]);

        $response->assertOk();
        $response->assertJson(['locale' => 'es']);
    }
}
