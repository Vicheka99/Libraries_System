<?php

use App\Models\Borrower;
use Spatie\FlareClient\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\Auth\AuthenticationController;

// Books controller Routes
Route::get('/books/{id}/read', [BookController::class, 'readPdf'])->name('books.read');
Route::resource('books', BookController::class);
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/{id}/update', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/categories/all', [App\Http\Controllers\BookController::class, 'categories'])->name('categories.all');

// Home Controller Routes
Route::post('/upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');
Route::post('/clear-temp-folder', [HomeController::class, 'clearTempFolder'])->name('clearTempFolder');

// Author Controller Routes
Route::get('/authors/search', [AuthorController::class, 'search'])->name('authors.search');
Route::get('/genders/all', [AuthorController::class, 'genders'])->name('authors.genders');
Route::post('/authors/store-ajax', [AuthorController::class, 'storeAjax'])->name('authors.store.ajax');

Route::get('/index', function () {
    return view('master');
});

Route::get('/', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('/index');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    // borrower list
    Route::get('/borrower', [App\Http\Controllers\BorrowerController::class, 'index'])->name('borrower.index');

    // endpoints to send confirmation/rejection emails and pickup view
    Route::post('/borrower/{id}/confirm', [App\Http\Controllers\BorrowerController::class, 'confirm'])->name('borrower.confirm');
    Route::post('/borrower/{id}/reject', [App\Http\Controllers\BorrowerController::class, 'reject'])->name('borrower.reject');
    Route::post('/borrower/create', [App\Http\Controllers\BorrowerController::class, 'create'])->name('borrower.create');
    Route::post('/borrowers', [App\Http\Controllers\BorrowerController::class, 'store']);

    // borrow transactions
    Route::get('/borrow-transactions', [App\Http\Controllers\BorrowTransactionController::class, 'index'])->name('borrow_transactions.index');
    Route::post('/borrow-transactions/{id}/pickup', [App\Http\Controllers\BorrowTransactionController::class, 'pickUp'])->name('borrow_transactions.pickup');

    Route::get('/books/{id}/read', [BookController::class, 'readPdf'])->name('books.read');
    Route::resource('books', BookController::class);
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books/{id}/update', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/categories/all', [App\Http\Controllers\BookController::class, 'categories'])->name('categories.all');

    // Home Controller Routes
    Route::post('/upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');
    Route::post('/clear-temp-folder', [HomeController::class, 'clearTempFolder'])->name('clearTempFolder');

    // Author Controller Routes
    Route::get('/authors/search', [AuthorController::class, 'search'])->name('authors.search');
    Route::get('/genders/all', [AuthorController::class, 'genders'])->name('authors.genders');
    Route::post('/authors/store-ajax', [AuthorController::class, 'storeAjax'])->name('authors.store.ajax');

    Route::get('/index', function () {
        return view('master');
    });
});
