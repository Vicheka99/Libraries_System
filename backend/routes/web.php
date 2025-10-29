<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('master');
});

Route::get('/', [HomeController::class, 'index'])->name('/index');
