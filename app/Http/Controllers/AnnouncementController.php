<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::published()
                                   ->active()
                                   ->orderBy('created_at', 'desc')
                                   ->paginate(12);
        
        return view('announcements.index', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        if ($announcement->status !== 'published') {
            abort(404);
        }
        
        $announcement->incrementViews();
        
        $recent = Announcement::published()
                            ->active()
                            ->where('id', '!=', $announcement->id)
                            ->latest()
                            ->limit(5)
                            ->get();
        
        return view('announcements.show', compact('announcement', 'recent'));
    }
}