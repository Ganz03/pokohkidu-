<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::upcoming()->orderBy('event_date', 'asc')->paginate(6);
        $completed = Event::completed()->orderBy('event_date', 'desc')->paginate(6);
        
        return view('events.index', compact('upcoming', 'completed'));
    }

    public function show(Event $event)
    {
        $event->incrementViews();
        
        $related = Event::where('status', $event->status)
                        ->where('id', '!=', $event->id)
                        ->latest()
                        ->limit(3)
                        ->get();
        
        return view('events.show', compact('event', 'related'));
    }
}

