<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $exams = Exam::all();
        return view('admin.exams')->with('exams', $exams);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $exam = Exam::create([
            'name' => $request->name,
            'content' => $request->content,
        ]);

        if ($exam) {
            return redirect()->back()->with('message', 'Exam Added Sucessfully!!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Error Adding Exam !']);
        }
    }
    public function delete($id)
    {
        $result = Exam::where('id', $id)->delete();
        if ($result) {
            return redirect()->back()->with('message', 'Exam Deleted Sucessfully!!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Error Deleting Exam !']);
        }
    }
}
