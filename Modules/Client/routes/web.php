<?php

use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\CompanyRegistrationController;

Route::prefix('join-us')->controller(CompanyRegistrationController::class)->as('join-us.')->group(function () {
    Route::get('/join-us', 'create')->name('create');
    Route::post('join-us', 'store')->name('store');
});
