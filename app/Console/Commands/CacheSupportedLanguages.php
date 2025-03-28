<?php

namespace App\Console\Commands;

use App\Models\Catalog;
use Illuminate\Console\Command;

class CacheSupportedLanguages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:supported_languages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $catalog = Catalog::where('code', 'language')->with('elements')->first();
        $languages = $catalog?->elements->pluck('code')->toArray() ?? [];
        cache()->forever('supported_languages', $languages);
        $this->info('Supported languages cache updated.');
    }
}
