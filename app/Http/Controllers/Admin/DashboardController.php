<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\ExamType;
use App\Models\Exam;
use App\Models\Syllabus;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $userCount = User::all()->count();
        $categoryCount = ExamType::all()->count();
        $examCount = Exam::all()->count();
        $syllabusCount = Syllabus::all()->count();
        return view('admin.dashboard', compact('userCount','categoryCount','examCount','syllabusCount'));
    }
}
