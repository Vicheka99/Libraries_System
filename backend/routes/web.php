<?php

use App\Models\Borrower;
use Spatie\FlareClient\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticationController;

// Route::get('/', function(){return view('dashboard');})->name('dashboard');
Route::resource('books', BookController::class);
Route::get('/categories/all', [App\Http\Controllers\BookController::class, 'categories'])->name('categories.all');
Route::post('/books/upload-temp', [App\Http\Controllers\BookController::class, 'uploadTemp'])->name('books.uploadTemp');
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

});
