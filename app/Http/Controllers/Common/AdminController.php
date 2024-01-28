<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
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

        return view('common.admin.auth.login', compact('base', 'base_url', 'settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function permissionList($id, $token): void
    {
        $client = new Client();
        $result = $client->post(env('BASE_URL') . '/api/v1/admin/permission_list', [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);
        Session::put('user_id', $id);
        $redis = Redis::connection();
        $redis->set($id, json_encode(json_decode($result->getBody())));
    }

    /**
     * Display a listing of the resource.
     */
    public function logout(): View
    {
        $user = Session::get('user_id');

        Redis::del($user);

        return view('common.admin.auth.logout');
    }

    /**
     * Display a listing of the resource.
     */
    public function forgotPassword(): View
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
        return view('common.admin.auth.forgot', compact('base', 'base_url', 'settings', 'urlparam'));
    }

    /**
     * Display a listing of the resource.
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
        return view('common.admin.auth.reset', compact('base', 'base_url', 'settings', 'urlparam'));
    }

    /**
     * Display a listing of the resource.
     */
    public function transactions(): View
    {
        $from_date = $_REQUEST['from_date'] ?? '';
        $to_date = $_REQUEST['to_date'] ?? '';
        $country_id = $_REQUEST['country_id'] ?? '';
        
        $dates['yesterday'] = Carbon::yesterday()->format('Y-m-d');
        $dates['today'] = Carbon::today()->format('Y-m-d');
        $dates['pre_week_start'] = date("Y-m-d", strtotime("last week monday"));
        $dates['pre_week_end'] = date("Y-m-d", strtotime("last week sunday"));
        $dates['cur_week_start'] = Carbon::today()->startOfWeek()->format('Y-m-d');
        $dates['cur_week_end'] = Carbon::today()->endOfWeek()->format('Y-m-d');
        $dates['pre_month_start'] = Carbon::parse('first day of last month')->format('Y-m-d');
        $dates['pre_month_end'] = Carbon::parse('last day of last month')->format('Y-m-d');
        $dates['cur_month_start'] = Carbon::parse('first day of this month')->format('Y-m-d');
        $dates['cur_month_end'] = Carbon::parse('last day of this month')->format('Y-m-d');
        $dates['pre_year_start'] = date("Y-m-d", strtotime("last year January 1st"));
        $dates['pre_year_end'] = date("Y-m-d", strtotime("last year December 31st"));
        $dates['cur_year_start'] = Carbon::parse('first day of January')->format('Y-m-d');
        $dates['cur_year_end'] = Carbon::parse('last day of December')->format('Y-m-d');
        $dates['nextWeek'] = Carbon::today()->addWeek()->format('Y-m-d');

        return view('common.admin.statement.overall', compact('dates', 'from_date', 'to_date', 'country_id'));
    }
}
