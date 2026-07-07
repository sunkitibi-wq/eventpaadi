<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest('created_at')->paginate(15);

        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data['slug'] = $this->generateSlug($data['slug'] ?? '', $data['title']);
        $data['published_at'] = $this->resolvePublishedAt($data);
        $data['user_id'] = $request->user()->id;

        Post::create($data);

        return redirect()->route('posts.index')->with('success', __('Post created successfully.'));
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $data['slug'] = $this->generateSlug($data['slug'] ?? '', $data['title'], $post->id);
        $data['published_at'] = $this->resolvePublishedAt($data);
        $data['user_id'] = $request->user()->id;

        $post->update($data);

        return redirect()->route('posts.index')->with('success', __('Post updated successfully.'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', __('Post deleted successfully.'));
    }

    protected function generateSlug(string $slug, string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($slug ?: $title);

        if (empty($slug)) {
            $slug = Str::slug($title);
        }

        $baseSlug = $slug;
        $suffix = 1;

        while (Post::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '<>', $ignoreId))
            ->exists()
        ) {
            $slug = $baseSlug.'-'.++$suffix;
        }

        return $slug;
    }

    protected function resolvePublishedAt(array $data): ?string
    {
        if ($data['status'] === 'published' && empty($data['published_at'])) {
            return now()->toDateTimeString();
        }

        return $data['published_at'] ?? null;
    }
}
