<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function get() {
        $active_post = Post::select('id', 'user_id', 'title', 'description', 'caption', 'image')
                ->where('is_active', true)
                ->get();
        $not_active_post = Post::select('id', 'user_id', 'title', 'description', 'caption', 'image')
                ->where('is_active', false)
                ->get();
        return view('admin.post', compact('active_post', 'not_active_post'));
    }

    public function create() {
        return view('admin.postcreate');
    }

    public function create_post(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'caption' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $path = $image->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        } else {
            $imagePath = null;
        }

        // Store event in database
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'caption' => $request->caption,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function update($id) {
        $post = Post::select('id', 'user_id', 'title', 'description', 'caption', 'image', 'is_active')
                ->where('id', $id)
                ->firstOrFail();
        return view('admin.postupdate', compact('post'));
    }

    public function update_post(Request $request, $id) {
        $post = Post::findOrFail($id);
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'caption' => 'required|string',
            'is_active' => 'boolean',
        ]);

        // Image update (just add new, no delete)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $post->image = 'images/' . $filename;
        }

        // Update other fields
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->caption = $request->caption;
        $post->is_active = $request->is_active;

        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully.');
    }
}
