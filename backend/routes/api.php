<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\Api\BookController;

Route::post('/borrowers', [BorrowerController::class, 'store']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/popular', [BookController::class, 'getPopular']);
Route::post('/books/{id}/view', [BookController::class, 'incrementView']);
Route::get('/books/category/{categoryId}', [BookController::class, 'getByCategory']);
Route::get('/books/category-name/{categoryName}', [BookController::class, 'getByCategoryName']);
