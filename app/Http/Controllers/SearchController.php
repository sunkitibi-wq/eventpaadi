<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return redirect()->back();
        }

        // Search for posts using Scout
        $posts = Post::search($query)->paginate(10);

        return view('search.results', [
            'query' => $query,
            'posts' => $posts,
        ]);
    }
}
