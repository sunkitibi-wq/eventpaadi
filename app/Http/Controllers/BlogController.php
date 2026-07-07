<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $page = \App\Models\Page::where('slug', 'blog')->first() ?? new \App\Models\Page();
        $posts = Post::published()
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('page', 'posts'));
    }

    public function show(Post $post): View
    {
        abort_unless($post->isPublished(), 404);

        return view('blog.show', compact('post'));
    }
}
