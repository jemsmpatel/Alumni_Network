<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function get(Request $request) {
        $posts = Post::with([
                'user:id,name,profile_image', // post owner
                'comment.user:id,name,profile_image' // each comment’s user
            ])
            ->withCount([
                'like as total_likes',
                'comment as total_comments'
            ])
            ->where('is_active', true)
            ->get();

        return view('dashboard', compact('posts'));
    }

    public function addComment(Request $request, Post $post) {
        // 1. Validate input
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        // 2. Create comment
        $post->comment()->create([
            'user_id' => auth()->id(), // current logged-in user
            'message' => $request->message,
        ]);

        // 3. Redirect back
        return redirect()->back()->with('success-comment', 'Comment added successfully!');
    }

    public function like(Post $post) {
        $userId = auth()->id();

        // Check if already liked
        $existingLike = $post->like()->where('user_id', $userId)->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $message = 'Post unliked successfully!';
        } else {
            // Like
            $post->like()->create([
                'user_id' => $userId,
            ]);
            $message = 'Post liked successfully!';
        }

        return redirect()->back()->with('success', $message);
    }
}
