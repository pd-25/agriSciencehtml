<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.aboutus');
    }

    public function articles()
    {
        return view('frontend.articles');
    }

    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function researches()
    {
        return view('frontend.researches');
    }

    public function services()
    {
        return view('frontend.services');
    }
}
