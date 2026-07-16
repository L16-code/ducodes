<?php

namespace App\Http\Controllers;

class LegalController extends Controller
{
    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }

    public function terms()
    {
        return view('frontend.pages.terms');
    }
}
