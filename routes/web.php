<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/{category_slug}/{post_slug}', [PostController::class, 'single'])->name('post.single');

