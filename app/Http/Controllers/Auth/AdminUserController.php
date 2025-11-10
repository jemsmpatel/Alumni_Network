<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function get() {
        $users = User::select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals', 'profile_image', 'is_active')->get();
        return view('admin.member', compact('users'));
    }

    public function update($id) {
        $user = User::select('id', 'name', 'email', 'phone', 'year', 'interests', 'goals', 'profile_image', 'is_active')
                ->where('id', $id)
                ->firstOrFail();
        return view('admin.memberupdate', compact('user'));
    }

    public function update_user(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|digits:10',
            'year' => 'required|integer',
            'interests' => 'nullable|string',
            'goals' => 'nullable|string',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'is_active' => 'nullable|boolean',
        ]);

        // Default to current image path
        $imagePath = $user->profile_image;

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'year' => $request->year,
            'interests' => $request->interests,
            'goals' => $request->goals,
            'profile_image' => $imagePath, // always has a value now
            'is_active' => $request->boolean('is_active'), // properly casts to boolean
        ]);

        return redirect()->back()->with('success', 'User updated successfully!');
    }
}
