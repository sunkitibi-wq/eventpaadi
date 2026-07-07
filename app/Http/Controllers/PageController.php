<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $page = Page::where('slug', 'home')->first() ?? new Page();

        return view('welcome', compact('page'));
    }

    public function academy(): View
    {
        $page = Page::where('slug', 'academy')->first() ?? new Page();

        return view('academy', compact('page'));
    }

    public function resources(): View
    {
        $page = Page::where('slug', 'resources')->first() ?? new Page();

        return view('resources', compact('page'));
    }

    public function support(): View
    {
        $page = Page::where('slug', 'support')->first() ?? new Page();

        return view('support', compact('page'));
    }
}
