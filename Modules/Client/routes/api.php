<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/customer', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    require __DIR__ . '/api/auth_routes.php';

    require __DIR__ . '/api/front_routes.php';

    require __DIR__ . '/api/order_routes.php';
});
