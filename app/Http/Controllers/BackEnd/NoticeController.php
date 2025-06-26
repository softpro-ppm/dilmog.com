<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function activeNotices()
    {
        // Get the latest active notice (status=1, published=1)
        $notice = \App\Notice::where('status', 1)
            ->where('published', 1)
            ->orderByDesc('id')
            ->first(['id', 'title', 'text']);
        if ($notice) {
            return response()->json([
                'title' => $notice->title,
                'description' => $notice->text
            ]);
        } else {
            return response()->json([]);
        }
    }
} 