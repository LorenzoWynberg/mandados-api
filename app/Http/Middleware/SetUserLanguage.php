<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Catalog;
use Closure;

class SetUserLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Authenticated user's language takes precedence
        if ($request->user() && $request->user()->lang_code) {
            app()->setLocale($request->user()->lang_code);
        }
        // 2. Fallback to Accept-Language header
        elseif ($langHeader = $request->header('Accept-Language')) {
            $locale = substr($langHeader, 0, 2);

            // 3. Dynamically pull supported language codes from catalog (cached)
            $supportedLanguages = cache()->rememberForever('supported_languages', function () {
                return Catalog::where('code', 'language')
                    ->first()
                    ?->elements
                    ?->pluck('code')
                    ?->toArray() ?? [];
            });

            // 4. Use valid language or default to 'es'
            if (in_array($locale, $supportedLanguages)) {
                app()->setLocale($locale);
            } else {
                app()->setLocale('es');
            }
        }
        // 5. Default if no header and no user
        else {
            app()->setLocale('es');
        }

        return $next($request);
    }
}
