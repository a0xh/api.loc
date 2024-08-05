<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::prefix('genres')->as('genres:')->middleware(['auth:sanctum', 'verified'])->group(
//     Route::get('/', App\Http\Controllers\Accounts\IndexController::class)->name('index')
// );