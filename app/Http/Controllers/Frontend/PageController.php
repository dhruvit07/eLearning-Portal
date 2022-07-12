<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('name', 'About Us')->first();
        return view('front.about')->with('page', $page);
    }
    public function mission()
    {
        $page = Page::where('name', '=', 'Our Mission and Our Vision')->first();
        return view('front.about')->with('page', $page);
    }
}
