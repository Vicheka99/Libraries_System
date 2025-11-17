<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowerController;

Route::post('/borrowers', [BorrowerController::class, 'store']);
