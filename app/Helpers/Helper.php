<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class Helper
{
    public static function getFavIcon()
    {
        return self::getCache()->settings?->settings_data?->site?->site_icon;
    }

    public static function getCache()
    {
        $domain = $_SERVER["SERVER_NAME"];

        return json_decode(Redis::get($domain));
    }

    public static function getSiteLogo()
    {
        return self::getCache()?->settings?->settings_data?->site?->site_logo;
    }

    public static function getBaseUrl()
    {
        return self::getCache()?->base_url;
    }

    public static function getSocketUrl()
    {
        return self::getCache()?->socket_url;
    }

    public static function getServiceBaseUrl()
    {
        $services = self::getCache()->services ?? [];
        $services_base_url = [];

        foreach ($services as $service) {
            $services_base_url[$service->admin_service] = $service->base_url;
        }

        return json_encode($services_base_url);
    }

    public static function isDestination()
    {
        $destination = self::getSettings()?->transport?->destination ?? 1;

        return $destination == 1;
    }

    public static function getSettings()
    {
        return self::getCache()?->settings?->settings_data;
    }

    public static function getDemomode()
    {
        $settings = self::getCache()->settings;
        return !empty($settings->demo_mode) ? $settings->demo_mode : 0;
    }

    public static function getChatmode()
    {
        $settings = self::getCache()->settings;
        return !empty($settings->chat) ? $settings->chat : 0;
    }

    public static function getEncrypt()
    {
        $settings = self::getCache()->settings;
        return !empty($settings->encrypt) ? $settings->encrypt : 0;
    }

    public static function getBanner()
    {
        $settings = self::getCache()->settings;
        return !empty($settings->banner) ? $settings->banner : 0;
    }

    public static function getSaltKey()
    {
        $settings = self::getCache()->settings;
        return !empty($settings) ? base64_encode($settings->company_id) : null;
    }

    public static function checkService($type)
    {
        return in_array($type, self::getServiceList());
    }

    public static function getServiceList()
    {
        $services = self::getCache()->services;
        $data = [];
        foreach ($services as $service) {
            $data[$service->id] = $service->admin_service;
        }
        return $data;
    }

    public static function getcmspage()
    {
        return self::getCache()->cmspage;
    }

    public static function checkPayment($type)
    {
        $paymentConfig = json_decode(
            json_encode(self::getSettings()->payment),
            true
        );
        $payment = array_values(
            array_filter($paymentConfig, function ($e) use ($type) {
                return $e["name"] == $type;
            })
        );
        return !empty($payment) && $payment[0]["status"] == 1;
    }

    public static function getCountryList()
    {
        $country_list = self::getCache()?->country;
        $data = [];
        foreach ($country_list as $country) {
            $data[$country->country->id] = $country->country->country_name;
        }
        return $data;
    }

    public static function permissionList()
    {
        $user = Session::get("user_id");
        $permissions = Redis::get($user);
        if ($permissions == null) {
            return [];
        }
        return json_decode($permissions);
    }

    public static function getCountryCurrency($id)
    {
        $country_list = self::getCache()?->country;
        $data = [];
        foreach ($country_list as $country) {
            $data[$country->country->id] = $country->currency;
        }
        return $data[$id];
    }

    public static function getAccessKey()
    {
        $domain = $_SERVER["SERVER_NAME"];
        $path = storage_path("license") . "/" . $domain . ".json";
        $config_file = file_exists($path);
        if ($config_file) {
            $config = file_get_contents($path);
            return json_decode($config, true)["accessKey"];
        }
        return "123456";
    }
}
