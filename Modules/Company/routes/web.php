<?php

use Illuminate\Support\Facades\Route;

Route::prefix('company')->group(function () {
    require __DIR__ . '/auth_routes.php';

    
});
