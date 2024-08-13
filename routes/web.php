<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(App\Http\Middleware\EnsureTokenIsValid::class);

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::controller(PostController::class)
    ->name('posts.')
    ->prefix('posts')
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });