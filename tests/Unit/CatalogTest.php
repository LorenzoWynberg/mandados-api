<?php

namespace Tests\Unit;

use App\Models\Catalog;
use App\Models\CatalogElement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_can_be_created_with_translations(): void
    {
        $catalog = Catalog::create([
            'code' => 'example_catalog',
            'name' => [
                'en' => 'Example',
                'es' => 'Ejemplo',
                'fr' => 'Exemple',
            ],
            'description' => [
                'en' => 'Example catalog',
                'es' => 'Catálogo de ejemplo',
                'fr' => 'Catalogue d’exemple',
            ],
        ]);

        $this->assertDatabaseHas('catalogs', ['code' => 'example_catalog']);
        $this->assertEquals('Ejemplo', $catalog->getTranslation('name', 'es'));
    }

    public function test_catalog_element_belongs_to_catalog(): void
    {
        $catalog = Catalog::factory()->create();

        /** @var CatalogElement $element */
        $element = CatalogElement::create([
            'catalog_id' => $catalog->id,
            'code' => 'el_code',
            'name' => [
                'en' => 'Element',
                'es' => 'Elemento',
                'fr' => 'Elément',
            ],
            'description' => [
                'en' => 'Element desc',
                'es' => 'Desc elemento',
                'fr' => 'Desc élément',
            ],
            'order' => 1,
            'meta' => ['test' => true],
        ]);

        $this->assertTrue($element->catalog->is($catalog));
    }

    public function test_catalog_element_has_translations(): void
    {
        $catalog = Catalog::factory()->create();

        $element = CatalogElement::create([
            'catalog_id' => $catalog->id,
            'code' => 'el_code',
            'name' => [
                'en' => 'Element',
                'es' => 'Elemento',
                'fr' => 'Elément',
            ],
            'description' => [
                'en' => 'Element desc',
                'es' => 'Desc elemento',
                'fr' => 'Desc élément',
            ],
            'order' => 1,
            'meta' => ['key' => 'value'],
        ]);

        $this->assertEquals('Elemento', $element->getTranslation('name', 'es'));
        $this->assertEquals('Desc élément', $element->getTranslation('description', 'fr'));
    }
}
