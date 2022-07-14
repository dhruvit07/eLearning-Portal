<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Page;
use App\Models\Carousel;
use App\Models\WhyUs;
use Auth;


class HomeController extends Controller
{
    public function __construct()
    { }
    public function index()
    {

        $icons = array(
            '<i class="fa fa-3x fa-book-open text-primary mb-4"></i>',
            '<i class="fa fa-3x fa-home text-primary mb-4"></i>',
            '<i class="fa fa-3x fa-globe text-primary mb-4"></i>',
            '<i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>'
        );
        $about = Page::where('name', '=', 'About Us')->first();
        $team = Team::all();
        $carousels = Carousel::all();
        $cards = WhyUs::all();
        $user = Auth::user();
        return view('front.index', compact('user', 'team', 'about', 'carousels', 'cards', 'icons'));
    }
}
