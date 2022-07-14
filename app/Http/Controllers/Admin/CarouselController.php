<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Syllabus;

class CarouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousel')->with('carousels', $carousels);
    }
    public function create(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,gif|max:3000'
        ], [
            'image.required' => 'Please upload an image',
            'image.mimes' => 'Only jpg,png and gif images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 3MB',
        ]);

        $error = false;
        $fileExtention = $request->file('image')->guessExtension();
        $filename = time() . '-' . $request->title . '.' . $fileExtention;
        $request->file('image')->move(public_path('uploads'), $filename);

        $member = Carousel::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename
        ]);

        if ($member)
            return redirect()->back()->with('message', 'Carousel Added Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Adding Carousel!!']);
    }
    public function delete($id)
    {
        $carousel = Carousel::where('id', $id)->first();
        unlink(public_path('uploads/' . $carousel->image));
        $result = $carousel->delete();
        if ($result)
            return redirect()->back()->with('message', 'Carousel Deleted Sucessfully!!');

        return redirect()->back()->withErrors(['message' => 'Error Deleting Carousel !']);
    }
}
