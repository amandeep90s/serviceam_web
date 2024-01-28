<?php

use App\Http\Controllers\Common\UserController;
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

Route::get('/login', [UserController::class, 'login']);

Route::get('/forgot-password', [UserController::class, 'forgotPassword']);

Route::get('/reset-password', [UserController::class, 'resetPassword']);

Route::get('/profile/{type}', function ($type) {
    return view('common.user.account.profile', compact('type'));
});

Route::view('/wallet', 'common.user.account.wallet');

Route::view('/home', 'common.user.home');

Route::view('/logout', 'common.user.auth.logout');

Route::redirect('/', '/user/login');
