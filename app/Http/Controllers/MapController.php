<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $query = Map::active()->latest();

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $maps = $query->paginate(12);
        
        // Get available years for filter
        $years = Map::active()
            ->whereNotNull('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Get latest 3 maps for featured section
        $latestMaps = Map::active()->latest()->limit(3)->get();

        return view('maps.index', compact('maps', 'years', 'latestMaps'));
    }

    public function show($slug)
    {
        $map = Map::where('slug', $slug)->active()->firstOrFail();
        
        // Increment views
        $map->incrementViews();
        
        // Get recent maps
        $recentMaps = $map->getRecentMaps();

        return view('maps.show', compact('map', 'recentMaps'));
    }
}