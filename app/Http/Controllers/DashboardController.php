<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $postIds = $user->posts()->pluck('id');

        $metrics = [
            'total_published' => $user->posts()->where('status', 'published')->count(),
            'total_drafts' => $user->posts()->where('status', 'draft')->count(),
            'total_comments' => Comment::whereIn('post_id', $postIds)->count(),
            'total_likes' => Reaction::whereIn('post_id', $postIds)->where('is_like', true)->count(),
            'total_dislikes' => Reaction::whereIn('post_id', $postIds)->where('is_like', false)->count(),
        ];

        $recentPosts = $user->posts()->latest()->take(5)->get();
        $recentComments = Comment::whereIn('post_id', $postIds)
            ->with('post')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('metrics', 'recentPosts', 'recentComments'));
    }
}
