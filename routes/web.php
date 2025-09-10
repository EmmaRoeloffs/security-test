<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/search', [PostController::class,'search'])->name('search'); // SQLi demo
Route::post('/comments', [CommentController::class,'store']);        // CSRF demo (geen auth)

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
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index']);
    });

    Route::get('/command', fn () => view('command'))->name('command'); // RCE demo
    Route::post('/command/run', [CommandController::class, 'run'])->name('command.run');
    Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
});

require __DIR__.'/auth.php';
