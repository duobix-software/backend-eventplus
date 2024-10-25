<?php

use Illuminate\Support\Facades\Route;
use Duobix\Company\Http\Controllers\EventController;

Route::prefix('company')->group(function () {
  


    Route::get('dashboard', [EventController::class, 'dashboard'])->name('dashboard');

 
    Route::resource('events', EventController::class);
});