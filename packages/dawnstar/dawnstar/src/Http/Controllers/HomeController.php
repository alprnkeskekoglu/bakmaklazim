<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;
use Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{

    public function index()
    {
        return view('Dawnstar::pages.home');
    }
}
