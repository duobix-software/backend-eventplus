<?php

use Illuminate\Support\Facades\Route;
use Duobix\Company\Http\Controllers\AuthenticateSessionController;

Route::prefix('login')->middleware('guest')->controller(AuthenticateSessionController::class)->as('login.')->group(function () {
    Route::get('/', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});

Route::post('logout', [AuthenticateSessionController::class, 'destroy'])
    ->middleware('auth:organizer')
    ->name('logout');