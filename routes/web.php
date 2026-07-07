<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/academy', [PageController::class, 'academy'])->name('academy');
Route::get('/resources', [PageController::class, 'resources'])->name('resources');
Route::get('/support', [PageController::class, 'support'])->name('support');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('posts', PostController::class);
});

require __DIR__.'/settings.php';
