<?php

use Illuminate\Support\Facades\Route;
use Duobix\Company\Http\Controllers\EventController;

Route::prefix('company')->group(function () {
    require __DIR__ . '/auth_routes.php';

    Route::resource('events', EventController::class)->names('events');

});
