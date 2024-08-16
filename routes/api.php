<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::get('/products/search', [ProductController::class, 'search']);


    Route::apiResource('products', ProductController::class);

});

Route::get('/user-data/{user_id}', [ApiController::class, 'getId']);
