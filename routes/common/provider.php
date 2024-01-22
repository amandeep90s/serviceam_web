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

Route::get('/login', function () {

    $base_url = \App\Helpers\Helper::getBaseUrl();

    $services = json_decode(\App\Helpers\Helper::getServiceBaseUrl(), true);

    $settings = json_encode(\App\Helpers\Helper::getSettings());

    $base = [];

    foreach ($services as $key => $service) {
        $base[$key] = $service;
    }

    $base = json_encode($base);

    return view('common.provider.auth.login', compact('base', 'base_url', 'settings'));
});
Route::get('/forgot-password', function () {
    $base_url = \App\Helpers\Helper::getBaseUrl();
    $services = json_decode(\App\Helpers\Helper::getServiceBaseUrl(), true);
    $settings = json_encode(\App\Helpers\Helper::getSettings());
    $base = [];
    foreach ($services as $key => $service) {
        $base[$key] = $service;
    }
    $base = json_encode($base);
    return view('common.provider.auth.forgot', compact('base', 'base_url', 'settings'));
});
Route::get('/reset-password', function () {
    $urlparam = ($_GET);
    $base_url = \App\Helpers\Helper::getBaseUrl();
    $services = json_decode(\App\Helpers\Helper::getServiceBaseUrl(), true);
    $settings = json_encode(\App\Helpers\Helper::getSettings());
    $base = [];
    foreach ($services as $key => $service) {
        $base[$key] = $service;
    }
    $base = json_encode($base);
    return view('common.provider.auth.reset', compact('base', 'base_url', 'settings', 'urlparam'));
});
Route::get('/signup', function () {

    $base_url = \App\Helpers\Helper::getBaseUrl();

    $services = json_decode(\App\Helpers\Helper::getServiceBaseUrl(), true);

    $settings = json_encode(\App\Helpers\Helper::getSettings());

    $base = [];

    foreach ($services as $key => $service) {
        $base[$key] = $service;
    }

    $base = json_encode($base);
    $otp = '';
    $email = '';

    return view('common.provider.auth.signup', compact('base', 'base_url', 'settings', 'otp', 'email'));
});

Route::get('/signup/{otp}/{email?}', function ($otp, $email) {

    $base_url = \App\Helpers\Helper::getBaseUrl();

    $services = json_decode(\App\Helpers\Helper::getServiceBaseUrl(), true);

    $settings = json_encode(\App\Helpers\Helper::getSettings());

    $base = [];

    foreach ($services as $key => $service) {
        $base[$key] = $service;
    }

    $base = json_encode($base);

    return view('common.provider.auth.signup', compact('base', 'base_url', 'settings', 'otp', 'email'));
});

Route::get('/profile/{type}', function ($type) {

    return view('common.provider.account.profile', compact('type'));
});

Route::get('/document/{type}', function ($type) {

    return view('common.provider.auth.document', compact('type'));
});

Route::view('/wallet', 'common.provider.account.wallet');

Route::redirect('/', '/provider/login');
Route::view('/home', 'common.provider.home');
Route::view('/myservice', 'common.provider.auth.service');

Route::get('/logout', function () {
    return view('common.provider.auth.logout');
});

Route::get('/service-list/{id}/edit', function ($id) {
    return view('common.provider.auth.edit-service', compact('id'));
});
