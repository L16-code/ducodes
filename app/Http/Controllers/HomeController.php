<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog; // Add this import

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $userType=Auth::user()->userType;
            if($userType=='user'){
                return view('dashboard');
            }else if($userType=='admin'){
                return view('admin.index');
            }else{
                return redirect()->back();
            }
        }
    }
    public function homepage()
    {
        return view('home.homepage');
    }
    public function about()
    {
        return view('home.about');
    }
    public function blogs()
    {
        return view('home.blogs');
    }
    public function error_page()
    {
        return view('admin.404');
    }

    public function getBlogs(Request $request)
    {
        $blogs = Blog::paginate(6); // Fetch 6 blogs per page
        return response()->json($blogs);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('blog_slug', $slug)->firstOrFail();
        $recentBlogs = Blog::latest()->take(5)->get();
        $relatedBlogs = Blog::where('blog_type',$blog->blog_type)
        ->where('id', '!=', $blog->id) 
        ->take(3)
        ->get();
        return view('home.blog-details', compact('blog','recentBlogs', 'relatedBlogs'));
    }
    public function contact()
    {
        return view('home.contact');
    }
}
