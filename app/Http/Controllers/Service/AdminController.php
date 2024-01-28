<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function services(): View
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
        return view('service.admin.statement.overallService', compact('dates', 'from_date', 'to_date', 'country_id'));
    }
}
