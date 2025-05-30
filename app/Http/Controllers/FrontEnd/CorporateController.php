<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class CorporateController extends Controller
{
    public function index()
    {
        return view('frontEnd.layouts.pages.corporate');
    }
}
