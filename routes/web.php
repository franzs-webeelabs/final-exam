<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::middleware('auth')->group(function () {
//     Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
//     Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
// });
// Route::get('/posts', [PostController::class, 'index'])->name('post.index');
// Route::get('/users/{user}/posts', [PostController::class, 'userPosts'])->name('user.posts');
// Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
// Route::resource('post', PostController::class);

Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class)->except(['index', 'show']);
});

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/users/{user}/posts', [PostController::class, 'userPosts'])->name('user.posts');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

// Route::get('/create', function () {
//     return view('posts.create');
// });
