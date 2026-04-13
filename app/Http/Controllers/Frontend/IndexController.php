<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ImpactNumbers;
use App\Models\Testimonial;
use App\Models\WhatWeDo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $whatWeDo = WhatWeDo::all();
        $impact = ImpactNumbers::get()->first();
        $about = About::get()->first();
        $testimonials = Testimonial::get();
        return view('frontend.index', compact('whatWeDo', 'impact', 'about','testimonials'));
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
