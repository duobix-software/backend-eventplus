<?php

use Illuminate\Support\Facades\Route;
use Duobix\Admin\Http\Controllers\AdminController;
use Inertia\Inertia;

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

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('welcome', []);
    });


    require __DIR__ . '/organisation_routes.php';
});
