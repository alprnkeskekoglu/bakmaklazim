<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{

    public function index()
    {
        $analyticsData = Analytics::getAnalyticsService()->data_realtime->get(env('ANALYTICS_VIEW_ID'), 'rt:activeUsers');

        dd($analyticsData);
        return view('Dawnstar::pages.home');
    }
}
