<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class PickDropController extends Controller
{
    public function index()
    {
        return view('frontEnd.layouts.pages.pick-drop');
    }
}
