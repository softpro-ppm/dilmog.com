<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the notices.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notices = Notice::latest()->paginate(10);
        return view('frontEnd.notice', compact('notices'));
    }

    /**
     * Display the specified notice.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('frontEnd.notice-details', compact('notice'));
    }
} 