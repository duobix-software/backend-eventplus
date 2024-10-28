<?php

use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\Api\EventController;
use Duobix\Client\Http\Controllers\Api\CategoryController;
use Duobix\Client\Http\Controllers\Api\CategoryTagsController;
use Duobix\Client\Http\Controllers\Api\OrganisationController;
use Duobix\Client\Http\Controllers\Api\TagCategoriesController;
use Duobix\Client\Http\Controllers\Api\TagController;

Route::resource('tags', TagController::class)->only('index', 'show')->names('tag');
Route::resource('categories', CategoryController::class)->only('index', 'show')->names('category');
Route::resource('categories.tags', CategoryTagsController::class)->only('index')->names('category.tag');
Route::resource('tags.categories', TagCategoriesController::class)->only('index')->only('index')->names('tag.category');

Route::get('/categories', [CategoryController::class, 'categories'])->name('category');
Route::get('/categories/{category}/tags', [CategoryController::class, 'tags'])->name('category.tags');

Route::get('/organisations', [OrganisationController::class, 'index'])->name('organisation.index');
Route::get('/organisations/{organisation}', [OrganisationController::class, 'show'])->name('organisation.show');

Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
