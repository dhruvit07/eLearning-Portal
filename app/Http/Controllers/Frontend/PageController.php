<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\WhyUs;

class PageController extends Controller
{
    public function about()
    {
        $cards = WhyUs::all();
        $page = Page::where('name', 'About Us')->first();
        return view('front.about', compact(['page', 'cards']));
    }
    public function mission()
    {
        $cards = WhyUs::all();
        $page = Page::where('name', '=', 'Our Mission and Our Vision')->first();
        return view('front.about',compact('page','cards'));
    }
}
