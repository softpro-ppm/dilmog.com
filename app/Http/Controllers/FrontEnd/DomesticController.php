<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Logo;

class DomesticController extends Controller
{
    public function __construct() {
        $favicon = Logo::where('type', 3)->where('status', 1)->orderByDesc('id')->first();
        view()->share('favicon', $favicon ? asset($favicon->image) : asset('favicon.png'));
    }

    public function index()
    {
        return view('frontEnd.layouts.pages.domestic');
    }
}
