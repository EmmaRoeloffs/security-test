<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
<<<<<<< Updated upstream

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
=======
use App\Http\Controllers\Admin\UserController as AdminUserController;

/**
 * Forceer dat {post} numeriek is → voorkomt botsing met 'create' en 'edit'
 */
Route::pattern('post', '[0-9]+');

/**
 * Public
 */
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/search', [PostController::class, 'search'])->name('search');

/**
 * Auth-only
 */
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Profile
>>>>>>> Stashed changes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

<<<<<<< Updated upstream
    Route::get('/', [PostController::class,'index'])->name('home');
    Route::resource('posts', PostController::class)->middleware('auth');
    Route::post('comments', [CommentController::class,'store'])->middleware('auth');

    // intentionally open admin for demo (before)
Route::prefix('admin')->group(function(){
    Route::get('users', [ProfileController::class,'index']); // vulnerable before

    Route::get('/search', [PostController::class,'search']);
});
});

require __DIR__.'/auth.php';
=======
    Route::resource('posts', PostController::class)->except(['index','show']);

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // Admin
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::get('users', [AdminUserController::class, 'index'])->name('admin.users');
    });


});

Route::resource('posts', PostController::class)->only(['index','show']);

require __DIR__ . '/auth.php';
>>>>>>> Stashed changes
