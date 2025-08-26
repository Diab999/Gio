<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{

    public function show(Request $request, $slug)
    {
        // Get locale from URL path
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        }
        
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }
} 