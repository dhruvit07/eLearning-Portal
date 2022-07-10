<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syllabus;

class SyllabusController extends Controller
{

    public function show($id)
    {
        $syllabus = Syllabus::where('id', $id)->first();
        return view('front.syllabus', compact(['syllabus']));
    }
}
