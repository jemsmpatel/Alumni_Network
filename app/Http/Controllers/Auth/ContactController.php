<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:2000',
        ]);

        // You can send mail or save to DB here
        // Mail::to('admin@example.com')->send(new ContactMail($request->all()));
        Contact::create($validated);
        // For now just flash success
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
