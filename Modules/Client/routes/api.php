<?php

use Duobix\Client\Http\Controllers\Api\CategoryController;
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

    // Route::get('/organisations')->name('organisations')

    // Route::get('/events')->name('events');

});