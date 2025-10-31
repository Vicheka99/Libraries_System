<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;

Route::get('/index', function () {
    return view('master');
});

Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('/index');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
