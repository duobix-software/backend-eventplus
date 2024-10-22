<?php

use Duobix\Admin\Http\Controllers\Organisation\OrganisationRequestController;
use Illuminate\Support\Facades\Route;


Route::prefix('organisations')->as('organisation.')->group(function () {


    Route::prefix('requests')->as('request.')->controller(OrganisationRequestController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{organisation}', 'show')->name('show');
        Route::post('/{organisation}/accept', 'accept')->name('accept');
        Route::post('/{organisation}/reject', 'reject')->name('reject');
    });
});
