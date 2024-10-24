<?php

use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\Api\EventController;
use Duobix\Client\Http\Controllers\Api\CategoryController;
use Duobix\Client\Http\Controllers\Api\OrganisationController;


Route::get('/categories', [CategoryController::class, 'categories'])->name('category');
Route::get('/categories/{category}/tags', [CategoryController::class, 'tags'])->name('category.tags');

Route::get('/organisations', [OrganisationController::class, 'index'])->name('organisation.index');
Route::get('/organisations/{organisation}', [OrganisationController::class, 'show'])->name('organisation.show');

Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
