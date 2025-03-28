<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * @property array $name
 *
 * @method string getTranslation(string $field, string $locale, bool $fallback = true)
 */
class CatalogElement extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = ['catalog_id', 'code', 'name', 'description', 'parent_ids'];

    public array $translatable = ['name', 'description'];

    protected $casts = [
        'parent_ids' => 'array',
        'name' => 'array',
        'meta' => 'array',
    ];

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class);
    }
}
