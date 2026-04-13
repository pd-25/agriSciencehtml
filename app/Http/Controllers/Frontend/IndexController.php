<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Approach;
use App\Models\ImpactNumbers;
use App\Models\Journey;
use App\Models\OurPurpose;
use App\Models\ResearchNumber;
use App\Models\Service;
use App\Models\Team;
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
        $about = About::get()->first();
        $purposes = OurPurpose::get();
        $journeys = Journey::get();
        $teams = Team::all();
        return view('frontend.aboutus', compact('about','purposes','journeys','teams'));
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
        $services = Service::all();
        $approaches = Approach::all();
        $impact = ImpactNumbers::get()->first();
        $testimonials = Testimonial::get();
        return view('frontend.services', compact('services', 'approaches','impact','testimonials'));
    }
}
