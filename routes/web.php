<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{category_slug}', [PostController::class, 'category'])->name('post.category');
Route::get('/posts/{category_slug}/{post_slug}', [PostController::class, 'single'])->name('post.single');

Route::get('/contact', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts/create_message', [ContactController::class, 'create_message'])->name('contacts.create_message');
