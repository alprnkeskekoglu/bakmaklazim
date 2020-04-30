<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{

    public function index()
    {
        $liveUser = Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeUsers')->totalsForAllResults['rt:activeUsers'];

        $mostVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7), 10);

        $visitorAndViews = Analytics::fetchVisitorsAndPageViews(Period::days(7, 1));

        $totalVisitorAndViews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));

        $topReferers = Analytics::fetchTopReferrers(Period::days(7))->take(11);

        $holder = [];
        foreach ($visitorAndViews as $visit) {
            $holder[$visit['date']->format('Y-m-d')][] = $visit;
        }

        foreach ($holder as $date => $hold) {
            $visit = 0;
            $pageView = 0;
            foreach ($hold as $h) {
                $visit += $h['visitors'];
                $pageView += $h['pageViews'];

            }
            $visitorArr[] = $visit;
            $pageViewArr[] = $pageView;
        }


        return view('Dawnstar::pages.home', compact( 'liveUser', 'mostVisitedPages', 'totalVisitorAndViews', 'visitorArr', 'pageViewArr', 'topReferers'));
    }


    public function getLiveUsers() {
        return Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeUsers')->totalsForAllResults['rt:activeUsers'];
    }
}
