<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function get() {
        $alumni = Alumni::with(['user' => function ($query) {
            $query->select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals');
        }])->where('user_id', Auth::user()->id)->get();

        return view('profile', compact('alumni'));
    }

    public function submit(Request $request) {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'digits:10'],
            'goals' => ['nullable', 'string'],
            'interests' => ['nullable', 'string'],
            'year' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
            $user->profile_image = $imagePath;
        }

        // Update basic info
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->goals = trim($request->goals);
        $user->interests = trim($request->interests);
        $user->year = $request->year;

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
