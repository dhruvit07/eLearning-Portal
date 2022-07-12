<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('name', '=', 'About Us')->first();
        return view('admin.about')->with('page', $page);
    }
    public function mission()
    {
        $page = Page::where('name', '=', 'Our Mission and Our Vision')->first();
        return view('admin.about ')->with('page', $page);
    }
    public function updatePage(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $page = Page::where('name', '=', $request->name)->first();

        if ($request->image != "") {
            $request->validate([
                'image' => 'required|mimes:png,jpg',
            ]);
            unlink(public_path('uploads/' . $page->image));
            $logoExtention = $request->file('image')->guessExtension();
            $imageName = time() . '-' . $request->title . '.' . $logoExtention;
            $request->file('image')->move(public_path('uploads'), $imageName);
            $page->update(['image' => $imageName]);
        }
        $page = Page::where('name', '=', $request->name);

        $page->update(array(
            'title' => $request->title,
            'content' => $request->content,
        ));

        if ($page) {
            return redirect()->back()->with('message', 'Updated Sucessfully!!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Updation Failed!']);
        }
    }
}
