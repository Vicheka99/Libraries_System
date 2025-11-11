<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BookController;
use Spatie\FlareClient\View;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AuthorController;

// Route::get('/', function(){return view('dashboard');})->name('dashboard');
Route::resource('books', BookController::class);
Route::get('/categories/all', [App\Http\Controllers\BookController::class, 'categories'])->name('categories.all');
Route::post('/books/upload-temp', [App\Http\Controllers\BookController::class, 'uploadTemp'])->name('books.uploadTemp');
Route::get('/index', function () {
    return view('master');
});
// Author Routes
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/search', [AuthorController::class, 'search'])->name('authors.search');
Route::post('/authors/store-ajax', [AuthorController::class, 'storeAjax'])->name('authors.store.ajax');
Route::get('/genders/all', [AuthorController::class, 'genders'])->name('genders.all');

Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('/index');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
