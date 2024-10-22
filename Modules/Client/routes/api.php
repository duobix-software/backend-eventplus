<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\Api\EventController;
use Duobix\Client\Http\Controllers\Api\CategoryController;
use Duobix\Client\Http\Controllers\Api\CheckoutController;
use Duobix\Client\Http\Controllers\Api\OrganisationController;

Route::get('/customer', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    require __DIR__ . '/api/auth_routes.php';

    Route::get('/categories', [CategoryController::class, 'categories'])->name('category');
    Route::get('/categories/{category}/tags', [CategoryController::class, 'tags'])->name('category.tags');

    Route::get('/organisations', [OrganisationController::class, 'index'])->name('organisation.index');
    Route::get('/organisations/{organisation}', [OrganisationController::class, 'show'])->name('organisation.show');

    Route::get('/events', [EventController::class, 'index'])->name('event.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');

    Route::post('checkout', CheckoutController::class)->name('checkout');
});