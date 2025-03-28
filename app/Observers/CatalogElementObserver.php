<?php

namespace App\Observers;

use App\Models\CatalogElement;
use Illuminate\Support\Facades\Artisan;

class CatalogElementObserver
{
    protected function shouldRefresh(CatalogElement $element): bool
    {
        $element->loadMissing('catalog');

        return $element->catalog && $element->catalog->code === 'language';
    }

    protected function refreshCache(): void
    {
        // app()->call('App\Console\Commands\CacheSupportedLanguages@handle');
        Artisan::call('cache:supported_languages');
    }

    public function created(CatalogElement $element): void
    {
        if ($this->shouldRefresh($element)) {
            $this->refreshCache();
        }
    }

    public function updated(CatalogElement $element): void
    {
        if ($this->shouldRefresh($element)) {
            $this->refreshCache();
        }
    }

    public function deleted(CatalogElement $element): void
    {
        if ($this->shouldRefresh($element)) {
            $this->refreshCache();
        }
    }

    public function restored(CatalogElement $element): void
    {
        if ($this->shouldRefresh($element)) {
            $this->refreshCache();
        }
    }

    public function forceDeleted(CatalogElement $element): void
    {
        if ($this->shouldRefresh($element)) {
            $this->refreshCache();
        }
    }
}
