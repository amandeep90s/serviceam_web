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
Route::view('/', 'common/web/home');

Route::get('/step/{step?}', function ($step) {
    return view('common.web.home');
});

Route::view('/home', 'common/web/home');

Route::view('/services', 'common/web/services');

Route::get('/pages/{type}', function ($type) {
    return view('common/web/cmspage', compact('type'));
});

Route::get('/track/{id}', function ($id) {
    return view('common.admin.track', compact('id'));
});

Route::get('/limit', function () {
    return view('common.admin.limit.index');
});

Route::get('/works', function () {
    return view('common.web.works');
});

Route::get('/home_services', function () {
    return view('common.web.home_services');
});

Route::get('/blog', function () {
    return view('common.web.blog');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->as('admin.')->group(base_path('routes/admin.php'));

Route::prefix('provider')->as('provider.')->group(base_path('routes/provider.php'));

Route::prefix('user')->as('user.')->group(base_path('routes/user.php'));
