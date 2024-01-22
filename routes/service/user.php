<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/service/{id}/service', function ($id = 0) {
    return view('service.user.service.home', compact('id'));
});

Route::view('/services/trips', 'service.user.service.trips');
