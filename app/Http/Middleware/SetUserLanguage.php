<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SetUserLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        // Dynamically pull supported language codes from catalog (cached)
        $supportedLanguages = Cache::get('supported_languages', []);

        // 1. Authenticated user's language (if valid)
        if ($request->user() && in_array($request->user()->lang_code, $supportedLanguages)) {
            app()->setLocale($request->user()->lang_code);
        }
        // 2. Fallback to Accept-Language header (first 2 chars)
        elseif ($langHeader = $request->header('Accept-Language')) {
            $locale = substr($langHeader, 0, 2);

            if (in_array($locale, $supportedLanguages)) {
                app()->setLocale($locale);
            } else {
                app()->setLocale('es');
            }
        }
        // 3. Final fallback
        else {
            app()->setLocale('es');
        }

        $response = $next($request);

        if (! $response instanceof Response) {
            throw new \RuntimeException('Middleware did not return a Response instance.');
        }

        return $response;
    }
}
