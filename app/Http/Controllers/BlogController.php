<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function add_blog()
    {
        return view('admin.blogs.addBlogs');
    }
}