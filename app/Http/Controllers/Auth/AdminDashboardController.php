<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Event;

class AdminDashboardController extends Controller
{
    public function get() {
        $total_users = count(User::all());
        $total_alumni = count(Alumni::all());
        $total_contact = count(Contact::all());

        // Latest 5 Users
        $users = User::latest()->take(5)->get();

        // Latest 5 Alumni
        $alumni = Alumni::with('user')->latest()->take(5)->get();

        // Latest 5 Posts
        $posts = Post::latest()->take(5)->get();

        // Latest 5 Events (not connected to user)
        $events = Event::latest()->take(5)->get();

        // Latest 5 Contacts (not connected to user)
        $contacts = Contact::latest()->take(5)->get();

        // Merge all into one collection
        $activities = collect()
            ->merge($users)
            ->merge($alumni)
            ->merge($posts)
            ->merge($events)
            ->merge($contacts)
            ->sortByDesc('created_at') // sort by latest
            ->take(10); // only top 10 activities

        // dd($activities);

        // return view('activities.index', compact('activities'));

        return view('admin.dashboard', compact('total_users','total_alumni','total_contact', 'activities'));
    }
}
