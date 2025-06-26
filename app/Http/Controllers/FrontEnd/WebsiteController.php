<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;

class WebsiteController extends Controller
{
   
    public function p2p()
    {
        $results = DB::table('paymentapis')->where('id', 1)->first();
        $wcities = City::where('status', 1)->get();
        return view('frontEnd.layouts.pages.p2p', compact('results', 'wcities'));
    }
}
