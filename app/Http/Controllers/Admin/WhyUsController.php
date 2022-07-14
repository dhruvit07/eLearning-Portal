<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyUs;

class WhyUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $cards = WhyUs::all();
        return view('admin.why-us')->with('cards', $cards);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',

        ]);

        $result = WhyUs::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($result)
            return redirect()->back()->with('message', 'Why Us Card Added Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Adding Why Us Card!!']);
    }
    public function delete($id)
    {
        $result = WhyUs::where('id', $id)->first()->delete();
        if ($result)
            return redirect()->back()->with('message', 'Why Us Card Deleted Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Deleting Why Us Card !']);
    }
}
