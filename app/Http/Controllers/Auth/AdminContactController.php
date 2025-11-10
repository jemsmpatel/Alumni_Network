<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function get() {
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    }

    public function update($id) {
        $contact = Contact::select('id', 'name', 'email', 'subject', 'message')
                ->where('id', $id)
                ->firstOrFail();
        return view('admin.contactupdate', compact('contact'));
    }

    public function update_contact(Request $request, $id) {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:2000',
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Contact updated successfully!');
    }
}
