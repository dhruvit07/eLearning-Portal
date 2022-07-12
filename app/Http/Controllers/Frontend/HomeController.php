<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Page;
use Auth;


class HomeController extends Controller
{
    public function __construct()
    { }
    public function index()
    {
        $about = Page::where('name', '=', 'About Us')->first();
        $team = Team::all();
        $user = Auth::user();
        return view('front.index', compact('user', 'team', 'about'));
    }
}
