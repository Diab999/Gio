<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Get locale from URL path
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        }
        
        $projects = Project::latest()->paginate(9);
        return view('projects.index', compact('projects'));
    }

    public function show(Request $request, $slug)
    {
        // Get locale from URL path
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session(['locale' => $locale]);
        }
        
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('projects.show', compact('project'));
    }

    public function featured()
    {
        $featuredProjects = Project::featured()->latest()->limit(3)->get();
        return response()->json($featuredProjects);
    }
} 