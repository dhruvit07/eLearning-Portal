<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function index()
    {
        $categories = ExamType::all();
        return view('front.categories')->with('categories', $categories);
    }
    public function show($id)
    {
        $category = ExamType::where('id', $id)->first();
        $syllabi = $category->syllabi;
        return view('front.syllabi', compact(['category', 'syllabi']));
    }
}
