<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show paginated blog list
    public function index()
    {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->paginate(6);
        return view('frontEnd.blog', compact('blogs'));
    }

    // Show single blog details
    public function show($id)
    {
        $blog = Blog::where('status', 1)->findOrFail($id);
        return view('frontEnd.blog-details', compact('blog'));
    }
}
