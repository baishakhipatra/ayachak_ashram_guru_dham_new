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

<<<<<<< HEAD
        $events = $query->paginate(6);

        return view('front.events.index', compact('events'));
    }
=======
        $events = $query->paginate(6); // paginate for frontend

        return view('front.events.index', compact('events'));
    }

    public function details($slug){
        $event = Event::with(['eventImage', 'relatedEventDetails.eventImage'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('front.events.details', compact('event'));
    }
>>>>>>> a14c673d6eefebc466d5eb106d40bc872cc8a5c1
}
