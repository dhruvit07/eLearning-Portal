<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use Auth;


class HomeController extends Controller
{
    public function __construct()
    { }
    public function index()
    {
        $team = Team::all();
        $user = Auth::user();
        return view('front.index', compact('user', 'team'));
    }
}
