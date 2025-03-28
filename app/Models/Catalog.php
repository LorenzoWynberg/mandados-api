<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * @method string getTranslation(string $field, string $locale, bool $fallback = true)
 */
class Catalog extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'description'];

    public array $translatable = ['name', 'description'];

    protected $casts = [];

    public function elements(): HasMany
    {
        return $this->hasMany(CatalogElement::class);
    }
}
