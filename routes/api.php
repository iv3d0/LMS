<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// API Resources
Route::apiResource('authors', AuthorController::class);
Route::get('books/search', [BookController::class, 'search']);
Route::apiResource('books', BookController::class);



