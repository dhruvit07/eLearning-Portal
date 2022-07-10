<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syllabus;
use App\Models\ExamType;
use App\Models\File;

class SyllabusController extends Controller
{

    public function index()
    {
        $syllabi = Syllabus::all();
        $examTypes = ExamType::all();
        return view('admin.syllabi', compact(['syllabi', 'examTypes']));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'category' => 'required',
            'files.*' => 'required|mimes:pdf,docx,pptx|max:20000'
        ], [
            'files.*.required' => 'Please upload an image',
            'files.*.mimes' => 'Only pdf,docx and pptx images are allowed',
            'files.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        ]);

        $error = false;
        $syllabus = Syllabus::create([
            'name' => $request->name,
            'content' => $request->content,
            'exam_type_id' => $request->category,
        ]);
        if ($syllabus) {
            foreach ($request->file('files') as $file) {
                $fileExtention = $file->guessExtension();
                $filename = time() . '-' . $request->name . '.' . $fileExtention;
                $file->move(public_path('uploads'), $filename);
                $fileUpload = File::create([
                    'name' => $filename,
                    'syllabus_id' => $syllabus->id
                ]);
                if ($fileUpload) { } else {
                    $error = true;
                }
            }
        } else {
            $error = true;
        }

        if (!$error)
            return redirect()->back()->with('message', 'Syllabus Added Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Adding Syllabus!!']);
    }
    public function delete($id)
    {
        $files = File::where('syllabus_id', $id)->get();
        foreach ($files as $file) {
            unlink(public_path('uploads/' . $file->name));
        }
        $result = Syllabus::where('id', $id)->delete();
        if ($result)
            return redirect()->back()->with('message', 'Exam Deleted Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Deleting Exam !']);
    }
}
