<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(): View
    {
        $base_url = Helper::getBaseUrl();

        $services = json_decode(Helper::getServiceBaseUrl(), true);

        $settings = json_encode(Helper::getSettings());

        $base = [];

        foreach ($services as $key => $service) {
            $base[$key] = $service;
        }

        $base = json_encode($base);

        return view('common.user.auth.login', compact('base', 'base_url', 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function forgotPassword(): View
    {
        $base_url = Helper::getBaseUrl();
        $services = json_decode(Helper::getServiceBaseUrl(), true);
        $settings = json_encode(Helper::getSettings());
        $base = [];
        foreach ($services as $key => $service) {
            $base[$key] = $service;
        }
        $base = json_encode($base);
        return view('common.user.auth.forgot', compact('base', 'base_url', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function resetPassword(): View
    {
        $urlparam = ($_GET);
        $base_url = Helper::getBaseUrl();
        $services = json_decode(Helper::getServiceBaseUrl(), true);
        $settings = json_encode(Helper::getSettings());
        $base = [];
        foreach ($services as $key => $service) {
            $base[$key] = $service;
        }
        $base = json_encode($base);
        return view('common.user.auth.reset', compact('base', 'base_url', 'settings', 'urlparam'));
    }
}
