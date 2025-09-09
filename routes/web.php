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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // posts
    Route::get('/', [PostController::class,'index'])->name('home');
    Route::resource('posts', PostController::class)->middleware('auth');

    //c
    Route::post('comments', [CommentController::class,'store']);
    // geen ->middleware('auth'

    // open admin for demo, unsafe!
    Route::prefix('admin')->group(function(){
    Route::get('users', [ProfileController::class,'index']); // vulnerable

    // SQL injection vulnerability
    Route::get('/search', [PostController::class,'search']);
});
});

require __DIR__.'/auth.php';
