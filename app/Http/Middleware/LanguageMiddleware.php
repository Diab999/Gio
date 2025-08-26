<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Get locale from session first, then cookie, fallback to default
        $locale = session('locale');
        
        // If no session locale, try cookie
        if (!$locale) {
            $locale = $request->cookie('locale');
        }
        
        // Ensure locale is valid
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'en';
        }
        
        // Set the application locale
        App::setLocale($locale);
        
        // Only store in session if it's not already set to avoid overriding
        if (!session('locale')) {
            session(['locale' => $locale]);
        }

        return $next($request);
    }
}