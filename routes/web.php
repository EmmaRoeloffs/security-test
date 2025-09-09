<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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