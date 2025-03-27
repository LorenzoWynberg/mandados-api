<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CatalogElement;
use App\Models\Catalog;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        // --- Language Catalog ---
        /** @var Catalog $languageCatalog */
        $languageCatalog = Catalog::create([
            'code' => 'language',
            'name' => [
                'en' => 'Language',
                'es' => 'Idioma',
                'fr' => 'Langue',
            ],
            'description' => [
                'en' => 'Languages supported by the application',
                'es' => 'Idiomas compatibles con la aplicación',
                'fr' => "Langues prises en charge par l'application",
            ],
        ]);

        $languages = [
            [
                'code' => 'es',
                'name' => ['en' => 'Spanish', 'es' => 'Español', 'fr' => 'Espagnol'],
                'description' => [
                    'en' => 'Spanish language',
                    'es' => 'Idioma español',
                    'fr' => 'Langue espagnole',
                ],
                'order' => 1,
            ],
            [
                'code' => 'en',
                'name' => ['en' => 'English', 'es' => 'Inglés', 'fr' => 'Anglais'],
                'description' => [
                    'en' => 'English language',
                    'es' => 'Idioma inglés',
                    'fr' => 'Langue anglaise',
                ],
                'order' => 2,
            ],
            [
                'code' => 'fr',
                'name' => ['en' => 'French', 'es' => 'Francés', 'fr' => 'Français'],
                'description' => [
                    'en' => 'French language',
                    'es' => 'Idioma francés',
                    'fr' => 'Langue française',
                ],
                'order' => 3,
            ],
        ];

        foreach ($languages as $lang) {
            CatalogElement::create([
                'catalog_id' => $languageCatalog->id,
                'code' => $lang['code'],
                'name' => $lang['name'],
                'description' => $lang['description'],
                'order' => $lang['order'],
                'meta' => [],
            ]);
        }

        // --- Sex Catalog ---
        /** @var Catalog $sexCatalog */
        $sexCatalog = Catalog::create([
            'code' => 'sex',
            'name' => [
                'en' => 'Identifies As',
                'es' => 'Se identifica como',
                'fr' => 'S\'identifie comme',
            ],
            'description' => [
                'en' => 'Gender identity options',
                'es' => 'Opciones de identidad de género',
                'fr' => 'Options d\'identité de genre',
            ],
        ]);

        $sexElements = [
            [
                'code' => 'male',
                'name' => ['en' => 'Male', 'es' => 'Masculino', 'fr' => 'Masculin'],
                'description' => [
                    'en' => 'Identifies as male',
                    'es' => 'Se identifica como masculino',
                    'fr' => 'S\'identifie comme masculin',
                ],
                'order' => 1,
            ],
            [
                'code' => 'female',
                'name' => ['en' => 'Female', 'es' => 'Femenino', 'fr' => 'Féminin'],
                'description' => [
                    'en' => 'Identifies as female',
                    'es' => 'Se identifica como femenino',
                    'fr' => 'S\'identifie comme féminin',
                ],
                'order' => 2,
            ],
            [
                'code' => 'unspecified',
                'name' => ['en' => 'Unspecified', 'es' => 'No especificado', 'fr' => 'Non spécifié'],
                'description' => [
                    'en' => 'Does not specify gender identity',
                    'es' => 'No especifica la identidad de género',
                    'fr' => 'N\'a pas spécifié d\'identité de genre',
                ],
                'order' => 3,
            ],
        ];

        foreach ($sexElements as $element) {
            CatalogElement::create([
                'catalog_id' => $sexCatalog->id,
                'code' => $element['code'],
                'name' => $element['name'],
                'description' => $element['description'],
                'order' => $element['order'],
                'meta' => [],
            ]);
        }

        // --- Business Type Catalog ---
        /** @var Catalog $businessCatalog */
        $businessCatalog = Catalog::create([
            'code' => 'business_type',
            'name' => [
                'en' => 'Business Type',
                'es' => 'Tipo de Negocio',
                'fr' => "Type d'Entreprise",
            ],
            'description' => [
                'en' => 'Types of businesses or legal entities',
                'es' => 'Tipos de negocios o entidades legales',
                'fr' => "Types d'entreprises ou d'entités juridiques",
            ],
        ]);

        $businessTypes = [
            [
                'code' => 'individual',
                'name' => ['en' => 'Individual', 'es' => 'Individual', 'fr' => 'Individuel'],
                'description' => [
                    'en' => 'Individual business entity',
                    'es' => 'Entidad comercial individual',
                    'fr' => 'Entreprise individuelle',
                ],
                'order' => 1,
            ],
            [
                'code' => 'corporation',
                'name' => ['en' => 'Corporation', 'es' => 'Corporación', 'fr' => 'Société'],
                'description' => [
                    'en' => 'Corporate business entity',
                    'es' => 'Entidad comercial corporativa',
                    'fr' => 'Société commerciale',
                ],
                'order' => 2,
            ],
            [
                'code' => 'non_profit',
                'name' => ['en' => 'Non-Profit', 'es' => 'Sin fines de lucro', 'fr' => 'Organisation à but non lucratif'],
                'description' => [
                    'en' => 'Non-profit organization',
                    'es' => 'Organización sin fines de lucro',
                    'fr' => 'Organisation à but non lucratif',
                ],
                'order' => 3,
            ],
        ];

        foreach ($businessTypes as $type) {
            CatalogElement::create([
                'catalog_id' => $businessCatalog->id,
                'code' => $type['code'],
                'name' => $type['name'],
                'description' => $type['description'],
                'order' => $type['order'],
                'meta' => [],
            ]);
        }
    }
}
