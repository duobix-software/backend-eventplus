<?php

use Duobix\Client\Http\Controllers\Api\CategoryController;
use Duobix\Client\Http\Controllers\Api\EventController;
use Duobix\Client\Http\Controllers\Api\OrganisationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/customer', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    require __DIR__ . '/api/auth_routes.php';

    // categories.
    // tags.
    // events.
    

    Route::get('/categories', [CategoryController::class, 'categories'])->name('category');
    Route::get('/categories/{category}/tags', [CategoryController::class, 'tags'])->name('category.tags');

    Route::get('/organisations', [OrganisationController::class, 'index'])->name('organisation.index');
    Route::get('/organisations/{organisation}', [OrganisationController::class, 'show'])->name('organisation.show');

    // Route::get('/organisations/{organisation}/events')->name('organisation.event.index');

    Route::get('/events', [EventController::class, 'index'])->name('event.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
});