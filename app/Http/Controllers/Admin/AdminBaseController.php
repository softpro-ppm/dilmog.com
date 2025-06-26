<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Logo;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        // Share dynamic favicon with all admin views
        $favicon = Logo::where('type', 3)->where('status', 1)->orderByDesc('id')->first();
        view()->share('favicon', $favicon ? asset($favicon->image) : asset('favicon.png'));
    }
} 