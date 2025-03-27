<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\RolesAndPermissionsSeeder;
use App\Models\CatalogElement;
use App\Models\Catalog;
use App\Models\User;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        $this->actingAs($this->admin);
    }

    public function test_can_get_catalog_list(): void
    {
        Catalog::factory()->count(3)->create();

        $response = $this->getJson('/api/catalogs');
        $response->assertOk()->assertJsonCount(3);
    }

    public function test_can_get_catalog_element_by_catalog_code(): void
    {
        $catalog = Catalog::factory()->create(['code' => 'sex']);

        CatalogElement::factory()->create([
            'catalog_id' => $catalog->id,
            'code' => 'male',
            'name' => ['en' => 'Male', 'es' => 'Masculino', 'fr' => 'Masculin'],
        ]);

        $response = $this->getJson("/api/catalogs/sex/elements");
        $response->assertOk()->assertJsonFragment(['code' => 'male']);
    }

    public function test_cannot_access_nonexistent_catalog(): void
    {
        $response = $this->getJson("/api/catalogs/fake_catalog/elements");
        $response->assertNotFound();
    }

    public function test_non_admin_cannot_access_catalogs(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson('/api/catalogs');
        $response->assertForbidden();
    }

    public function test_non_admin_cannot_access_catalog_elements(): void
    {
        $catalog = Catalog::factory()->create(['code' => 'sex']);
        CatalogElement::factory()->create([
            'catalog_id' => $catalog->id,
            'code' => 'male',
            'name' => ['en' => 'Male', 'es' => 'Masculino', 'fr' => 'Masculin'],
        ]);

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson("/api/catalogs/sex/elements");
        $response->assertForbidden();
    }

    public function test_non_admin_cannot_create_catalog(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $payload = [
            'code' => 'test_catalog',
            'name' => ['en' => 'Test', 'es' => 'Prueba', 'fr' => 'Essai'],
        ];

        $response = $this->postJson('/api/catalogs', $payload);
        $response->assertForbidden();
    }

    public function test_non_admin_cannot_update_catalog(): void
    {
        $catalog = Catalog::factory()->create();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->putJson("/api/catalogs/{$catalog->id}", [
            'name' => ['en' => 'Updated Name'],
        ]);

        $response->assertForbidden();
    }
}
