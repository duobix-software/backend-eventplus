<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    require __DIR__ . '/api/auth_routes.php';

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/customer', fn(Request $request) => $request->user());

        require __DIR__ . '/api/front_routes.php';

        require __DIR__ . '/api/order_routes.php';
    });
});
