<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::apiResources( [
    'posts' => PostController::class,
]);
