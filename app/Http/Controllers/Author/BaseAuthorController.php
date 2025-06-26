<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Logo;

class BaseAuthorController extends Controller
{
    public function __construct()
    {
        // Share dynamic favicon with all author views
        $favicon = Logo::where('type', 3)->where('status', 1)->orderByDesc('id')->first();
        view()->share('favicon', $favicon ? asset($favicon->image) : asset('favicon.png'));
    }
} 