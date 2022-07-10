<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('front.exams', compact(['exams']));
    }
    public function show($id)
    {
        $exam = Exam::where('id', $id)->first();
        if ($exam != null)
            return view('front.exam', compact(['exam']));
        return abort(404);
    }
}
