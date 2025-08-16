<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
                   ->orderBy('published_at', 'desc')
                   ->paginate(12);
        
        $featured = News::published()->featured()->latest()->limit(3)->get();
        
        return view('news.index', compact('news', 'featured'));
    }

    public function show(News $news)
    {
        if ($news->status !== 'published') {
            abort(404);
        }
        
        $news->incrementViews();
        
        $related = News::published()
                      ->where('category', $news->category)
                      ->where('id', '!=', $news->id)
                      ->latest()
                      ->limit(3)
                      ->get();
        
        return view('news.show', compact('news', 'related'));
    }
}
