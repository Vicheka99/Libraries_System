<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticationController;

Route::get('/index', function () {
    return view('master');
});

Route::get('/', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('/index');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    Route::get('/borrower', [App\Http\Controllers\BorrowerController::class, 'index'])->name('borrower.index');
    Route::post('/borrower/create', [App\Http\Controllers\BorrowerController::class, 'create'])->name('borrower.create');
});
