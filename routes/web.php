<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('posts');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [PostController::class,'index'])->name('home');      // lijst posts
Route::get('/search', [PostController::class,'search'])->name('search'); // SQLi demo (public)
Route::post('/comments', [CommentController::class,'store']);        // CSRF demo (public, geen auth)

/**
 * Auth-only
 */
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD posts (create/update/delete). Index/show zijn al publiek via controller-except.
    Route::resource('posts', PostController::class)->except(['index','show']);

    // Broken Access Control demo: GEEN can:admin
    Route::prefix('admin')->group(function () {
        Route::get('users', [ProfileController::class,'index']); // kwetsbaar: elke ingelogde user kan dit zien
    });
});

require __DIR__.'/auth.php';
