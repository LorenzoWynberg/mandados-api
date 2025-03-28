<?php

namespace Tests\Unit;

use App\Models\Catalog;
use App\Models\CatalogElement;
use Database\Seeders\CatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogSeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CatalogSeeder::class);
    }

    public function test_catalogs_exist(): void
    {
        $this->assertDatabaseHas('catalogs', ['code' => 'language']);
        $this->assertDatabaseHas('catalogs', ['code' => 'sex']);
        $this->assertDatabaseHas('catalogs', ['code' => 'business_type']);
    }

    public function test_language_elements_exist(): void
    {
        $catalog = Catalog::where('code', 'language')->first();
        $this->assertNotNull($catalog);
        $this->assertTrue($catalog->elements()->where('code', 'en')->exists());
        $this->assertTrue($catalog->elements()->where('code', 'es')->exists());
        $this->assertTrue($catalog->elements()->where('code', 'fr')->exists());
    }

    public function test_sex_elements_exist(): void
    {
        $catalog = Catalog::where('code', 'sex')->first();
        $this->assertNotNull($catalog);
        $this->assertTrue($catalog->elements()->where('code', 'male')->exists());
        $this->assertTrue($catalog->elements()->where('code', 'female')->exists());
        $this->assertTrue($catalog->elements()->where('code', 'unspecified')->exists());
    }

    public function test_elements_are_translatable(): void
    {
        $element = CatalogElement::where('code', 'en')->first();
        $this->assertNotNull($element);
        $this->assertEquals('English', $element->getTranslation('name', 'en'));
        $this->assertEquals('Inglés', $element->getTranslation('name', 'es'));
        $this->assertEquals('Anglais', $element->getTranslation('name', 'fr'));
    }
}
