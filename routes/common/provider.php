<?php

use App\Http\Controllers\Common\ProviderController;
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

Route::get("/login", [ProviderController::class, 'login']);

Route::get("/forgot-password", [ProviderController::class, 'forgotPassword']);

Route::get("/reset-password", [ProviderController::class, 'resetPassword']);

Route::get("/signup", [ProviderController::class, 'signup']);

Route::get("/signup/{otp}/{email?}", [ProviderController::class, 'signupWithOTP']);

Route::get("/profile/{type}", function ($type) {
    return view("common.provider.account.profile", compact("type"));
});

Route::get("/document/{type}", function ($type) {
    return view("common.provider.auth.document", compact("type"));
});

Route::view("/wallet", "common.provider.account.wallet");

Route::redirect("/", "/provider/login");

Route::view("/home", "common.provider.home");

Route::view("/myservice", "common.provider.auth.service");

Route::get("/logout", function () {
    return view("common.provider.auth.logout");
});

Route::get("/service-list/{id}/edit", function ($id) {
    return view("common.provider.auth.edit-service", compact("id"));
});
