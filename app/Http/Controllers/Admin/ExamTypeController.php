<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $categories = ExamType::all();
        return view('admin.categories')->with('categories', $categories);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = ExamType::create([
            'name' => $request->name
        ]);

        if ($category) {
            return redirect()->back()->with('message', 'Category Added Sucessfully!!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Error Adding Category !']);
        }
    }
    public function delete($id)
    {
        $result = ExamType::where('id', $id)->delete();
        if ($result) {
            return redirect()->back()->with('message', 'Category Deleted Sucessfully!!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Error Deleting Category !']);
        }
    }
}
