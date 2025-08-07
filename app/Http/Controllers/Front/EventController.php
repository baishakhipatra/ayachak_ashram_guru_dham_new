<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //

    public function list(Request $request) {
      
        return view('front.events.list');
    }
}
