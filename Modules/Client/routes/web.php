<?php

use Illuminate\Support\Facades\Route;
use Duobix\Client\Http\Controllers\ClientController;
use Duobix\Client\Http\Controllers\CompanyRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('join-us')->controller(CompanyRegistrationController::class)->as('join-us.')->group(function () {
    Route::get('/join-us', 'create')->name('create');
    Route::post('join-us', 'store')->name('store');
});
