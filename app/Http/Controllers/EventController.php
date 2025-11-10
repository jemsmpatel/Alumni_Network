<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function get(Request $request) {
        $events = Event::all()
            ->where('is_active', true);

        return view('event', compact('events'));
    }
}
