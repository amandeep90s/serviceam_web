<?php

namespace App\Providers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('service', function () {
            $args = func_get_args();

            $services = Helper::getCache()->services;

            $data = [];

            foreach ($services as $service) {
                $data[] = $service->admin_service;
            }

            foreach ($args as $arg) {
                if (in_array(strtoupper($arg), $data)) {
                    return true;
                }
            }
            return false;
        });

        //For user Permission
        Blade::if('permission', function ($permission) {
            $permissions = Helper::permissionList();

            if (count($permissions) == 0) {
                return redirect('/admin/logout');
            }
            return in_array($permission, $permissions);
        });
    }
}
