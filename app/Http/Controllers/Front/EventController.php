<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = Event::query()->with('eventImage')->latest();

        if ($request->filled('term')) {
            $search = $request->term;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('venue', 'like', "%{$search}%");
        }

        $events = $query->paginate(6);

        return view('front.events.index', compact('events'));
    }
}
