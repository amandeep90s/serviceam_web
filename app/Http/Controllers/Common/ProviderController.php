<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ProviderController extends Controller
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
        return view(
            "common.provider.auth.login",
            compact("base", "base_url", "settings")
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function signup(): View
    {
        $base_url = Helper::getBaseUrl();
        $services = json_decode(Helper::getServiceBaseUrl(), true);
        $settings = json_encode(Helper::getSettings());
        $base = [];
        foreach ($services as $key => $service) {
            $base[$key] = $service;
        }
        $base = json_encode($base);
        $otp = "";
        $email = "";
        return view(
            "common.provider.auth.signup",
            compact("base", "base_url", "settings", "otp", "email")
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function signupWithOTP($otp, $email): View
    {
        $base_url = Helper::getBaseUrl();
        $services = json_decode(Helper::getServiceBaseUrl(), true);
        $settings = json_encode(Helper::getSettings());
        $base = [];
        foreach ($services as $key => $service) {
            $base[$key] = $service;
        }
        $base = json_encode($base);
        return view(
            "common.provider.auth.signup",
            compact("base", "base_url", "settings", "otp", "email")
        );
    }

    /**
     * Store a newly created resource in storage.
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
        return view(
            "common.provider.auth.forgot",
            compact("base", "base_url", "settings")
        );
    }

    /**
     * Display the specified resource.
     */
    public function resetPassword(): View
    {
        $urlparam = $_GET;
        $base_url = Helper::getBaseUrl();
        $services = json_decode(Helper::getServiceBaseUrl(), true);
        $settings = json_encode(Helper::getSettings());
        $base = [];
        foreach ($services as $key => $service) {
            $base[$key] = $service;
        }
        $base = json_encode($base);
        return view(
            "common.provider.auth.reset",
            compact("base", "base_url", "settings", "urlparam")
        );
    }
}
