<?php

namespace Dawnstar\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('Dawnstar::pages.home');
    }
}
