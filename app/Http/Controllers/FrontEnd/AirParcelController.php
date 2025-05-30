<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class AirParcelController extends Controller
{
    public function index()
    {
        return view('frontEnd.layouts.pages.air-parcel');
    }
}
