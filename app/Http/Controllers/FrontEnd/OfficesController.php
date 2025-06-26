<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEnd\FrontEndController;

class OfficesController extends FrontEndController
{
    public function index()
    {
        return view('frontEnd.layouts.pages.offices');
    }
}
