<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $team = Team::all();
        return view('admin.team')->with('team', $team);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'qualification' => 'required',
            'post' => 'required',
            'image' => 'required|mimes:jpeg,png,gif|max:2000'
        ], [
            'image.required' => 'Please upload an image',
            'image.mimes' => 'Only jpg,png and gif images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 2MB',
        ]);

        $error = false;
        $fileExtention = $request->file('image')->guessExtension();
        $filename = time() . '-' . $request->name . '.' . $fileExtention;
        $request->file('image')->move(public_path('uploads'), $filename);

        $member = Team::create([
            'name' => $request->name,
            'qualifications' => $request->qualification,
            'post' => $request->post,
            'image' => $filename
        ]);

        if ($member)
            return redirect()->back()->with('message', 'Member Added Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Adding Member!!']);
    }
    public function delete($id)
    {
        $member = Team::where('id', $id)->first();
        unlink(public_path('uploads/' . $member->image));
        $result = $member->delete();
        if ($result)
            return redirect()->back()->with('message', 'Member Removed Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Removed Member !']);
    }
}
