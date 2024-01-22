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

Route::view('/service', 'service.provider.serve.serve');
// SERVICE HISTORY FOR SERVICE

Route::get('/trips/service/{type}', ['as' => 'servicehistory', function ($type) {
    return view('service.provider.serve.history', compact('type'));
}]);