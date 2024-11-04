<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\Api\TagController;
use Duobix\Client\Http\Controllers\Api\EventController;
use Duobix\Client\Http\Controllers\Api\PaymentController;
use Duobix\Client\Http\Controllers\Api\CategoryController;
use Duobix\Client\Http\Controllers\Api\CheckoutController;
use Duobix\Client\Http\Controllers\Api\CategoryTagsController;
use Duobix\Client\Http\Controllers\Api\OrganisationController;
use Duobix\Client\Http\Controllers\Api\TagCategoriesController;
use Duobix\Client\Http\Controllers\Api\Auth\RegisterController;
use Duobix\Client\Http\Controllers\Api\Auth\AuthenticateController;
use Duobix\Client\Http\Controllers\Api\OrderController;

Route::prefix('v1')->group(function () {

    Route::prefix('auth')->as('auth.')->group(function () {
        Route::middleware('guest')->group(function() {
            Route::post('/login', [AuthenticateController::class, 'store'])->name('login');
            
            Route::post('/register', RegisterController::class)->name('register');
        });
    
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');
        });
    });

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/customer', fn(Request $request) => $request->user());

        Route::resource('tags', TagController::class)->only('index', 'show')->names('tag');
        Route::resource('categories', CategoryController::class)->only('index', 'show')->names('category');
        Route::resource('categories.tags', CategoryTagsController::class)->only('index')->names('category.tag');
        Route::resource('tags.categories', TagCategoriesController::class)->only('index')->only('index')->names('tag.category');
        Route::resource('organisations', OrganisationController::class)->only('index', 'show')->names('organisation');
        Route::resource('events', EventController::class)->only('index', 'show')->names('event');

        Route::post('checkout', CheckoutController::class)->name('checkout');

        Route::resource('orders', OrderController::class)->only('index', 'show')->names('order');
    });

    Route::prefix('payment')->controller(PaymentController::class)->as('payment.')->group(function () {
        Route::get('/success', 'success')->name('success');
        Route::get('/failure', 'failure')->name('failure');
        Route::post('/webhook', 'webhook')->name('webhook');
    });
});
