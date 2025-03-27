<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

/**
 * @property array $name
 * @method string getTranslation(string $field, string $locale, bool $fallback = true)
 */
class CatalogElement extends Model
{
    use HasTranslations;
    use SoftDeletes;
    use HasFactory;

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
