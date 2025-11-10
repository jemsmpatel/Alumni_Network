<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Log;

class AdminEventController extends Controller
{
    public function create_event(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'link' => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $path = $image->move(public_path('images'), $filename); // moves to /public/images

            $imagePath = 'images/' . $filename;
        } else {
            $imagePath = null;
        }

        // Store event in database
        Event::create([
            'name' => $request->name,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $imagePath,
            'is_active' => true, // default active
        ]);

        return redirect()->back()->with('success', 'Event created successfully.');
    }

    public function create() {
        return view('admin.eventcreate');
    }

    public function get() {
        $active_event = Event::select('id', 'name', 'location', 'date', 'description', 'link', 'image')
                ->where('is_active', true)
                ->get();
        $not_active_event = Event::select('id', 'name', 'location', 'date', 'description', 'link', 'image')
                ->where('is_active', false)
                ->get();
        return view('admin.event', compact('active_event', 'not_active_event'));
    }

    public function update($id) {
        $event = Event::select('id', 'name', 'location', 'date', 'description', 'link', 'image', 'is_active')
                ->where('id', $id)
                ->firstOrFail();
        return view('admin.eventupdate', compact('event'));
    }

    public function update_event(Request $request, $id) {
        $event = Event::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'boolean',
        ]);

        // Image update (just add new, no delete)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $event->image = 'images/' . $filename;
        }

        // Update other fields
        $event->name = $request->name;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->link = $request->link;
        $event->is_active = $request->is_active;

        $event->save();

        return redirect()->back()->with('success', 'Event updated successfully.');
    }

}
