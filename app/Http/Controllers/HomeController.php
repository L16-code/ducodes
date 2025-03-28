<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
}
