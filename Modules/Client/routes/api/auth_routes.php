<?php

use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\Api\Auth\AuthenticateController;
use Duobix\Client\Http\Controllers\Api\Auth\RegisterController;

Route::prefix('auth')->as('auth.')->group(function () {

    Route::middleware('guest')->group(function() {
        Route::post('/login', [AuthenticateController::class, 'store'])->name('login');
        
        Route::post('/register', RegisterController::class)->name('register');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');
    });
    
});