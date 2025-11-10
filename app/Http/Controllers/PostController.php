<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function get_posts(Request $request) {
        $posts = Post::select('id', 'title', 'description', 'caption', 'image')
                ->where('user_id', Auth::user()->id)
                ->where('is_active', true)
                ->get();
        return view('posts', compact('posts'));
    }

    public function get(Request $request) {
        return view('add-post');
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
        $post = Post::select('id', 'title', 'description', 'caption', 'image')
                ->where('id', $id)
                ->firstOrFail();
        return view('postupdate', compact('post'));
    }

    public function update_post(Request $request, $id) {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
            'caption' => 'required|string',
        ]);

        // Image update (just add new, no delete)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $post->image = 'images/' . $filename;
        }

        // Update other fields
        $post->title = $request->title;
        $post->description = $request->description;
        $post->caption = $request->caption;

        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully.');
    }

    public function delete_post($id) {
        $post = Post::findOrFail($id);
        $post->is_active = false;
        $post->save();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }

}
