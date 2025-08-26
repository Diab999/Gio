<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        // Get locale from URL path
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        }
        
        $portfolios = Portfolio::latest()->paginate(12);
        return view('portfolio.index', compact('portfolios'));
    }
} 