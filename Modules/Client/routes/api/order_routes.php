<?php

use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\Api\CheckoutController;
use Duobix\Client\Http\Controllers\Api\ChargilyPayController;

Route::post('checkout', CheckoutController::class)->name('checkout');

Route::prefix('chargilypay')->controller(ChargilyPayController::class)->as('chargilypay.')->group(function () {
    Route::post('/redirect', 'redirect')->name('redirect');
    Route::get('/back', 'back')->name('back');
    Route::get('/back/success', 'success')->name('success');
    Route::get('/back/failure', 'failure')->name('failure');
    Route::post('/webhook', 'webhook')->name('webhook');
});
