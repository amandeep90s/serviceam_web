<?php

use App\Http\Controllers\Service\AdminController;
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

// SERVICE MAIN CATEGORIES

Route::view('/service-categories', 'service.admin.categories.index');

Route::view('/service-categories/create', 'service.admin.categories.form');

Route::get('/service-categories/{id}/edit', function ($id) {
    return view('service.admin.categories.form', compact('id'));
});

// SERVICE SUB CATEGORIES
Route::view('/service-subcategories', 'service.admin.subcategories.index');

Route::view('/service-subcategories/create', 'service.admin.subcategories.form');

Route::get('/service-subcategories/{id}/edit', function ($id) {
    return view('service.admin.subcategories.form', compact('id'));
});

// SERVICE
Route::view('/service-list', 'service.admin.services.index');

Route::view('/service-list/create', 'service.admin.services.form');

Route::get('/service-list/{id}/edit', function ($id) {
    return view('service.admin.services.form', compact('id'));
});

//DISPUTE
Route::view('/service-dispute', 'service.admin.dispute.index');

Route::view('/service-dispute/create', 'service.admin.dispute.form');

Route::get('/service-dispute/{id}/edit', function ($id) {
    return view('service.admin.dispute.editform', compact('id'));
});

// service request History
Route::view('/service-history', 'service.admin.history.requesthistory');

//Service schedule history
Route::view('/serviceschedulehistory', 'service.admin.history.requestschedulehistory');

// Request Details
Route::get('/service-requestdetails/{id}/view', function ($id) {
    return view('service.admin.services.requests', compact('id'));
});

Route::get('/statement/service', [AdminController::class, 'services'])->name('service.statement.range');
