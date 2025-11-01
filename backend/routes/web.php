<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BookController;
use Spatie\FlareClient\View;

// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/books', function () {
//     return view('books');
// })->name('books');
Route::get('/', function(){return view('dashboard');})->name('dashboard');
Route::get('/books', [BookController::class, 'index'])->name('books');
