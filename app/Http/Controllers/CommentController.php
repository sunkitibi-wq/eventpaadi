<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (\App\Models\Setting::get('allow_comments', 'true') !== 'true') {
            return back()->with('error', 'Comments are currently disabled.');
        }

        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:2000',
            'guest_name' => 'nullable|string|max:255',
            'guest_email' => 'nullable|email|max:255',
        ]);

        $comment = new Comment();
        $comment->post_id = $validated['post_id'];
        $comment->content = $validated['content'];
        $comment->is_approved = true; // Auto-approve for now

        if (auth()->check()) {
            $comment->user_id = auth()->id();
        } else {
            $request->validate([
                'guest_name' => 'required|string|max:255',
                'guest_email' => 'required|email|max:255',
            ]);
            $comment->guest_name = $validated['guest_name'];
            $comment->guest_email = $validated['guest_email'];
        }

        $comment->save();

        return back()->with('success', 'Your comment has been posted successfully!');
    }
}
