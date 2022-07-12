<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.generalsettings');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'contact' => 'required|phone',
            'footer' => 'required',
            'copyright' => 'required',
        ]);
        $result = GeneralSetting::where('id', 1);
        $gs = GeneralSetting::find(1);

        if ($request->logo != "") {
            $request->validate([
                'logo' => 'required|mimes:png,jpg',
            ]);
            unlink(public_path('uploads/' . $gs->logo));
            $logoExtention = $request->file('logo')->guessExtension();
            $logoName = time() . '-' . $request->name . '.' . $logoExtention;
            $request->file('logo')->move(public_path('uploads'), $logoName);
            $result->update(['logo' => $logoName]);
        }
        if ($request->favicon != "") {
            $request->validate([
                'favicon' => 'required|mimes:png,jpg',
            ]);
            unlink(public_path('uploads/' . $gs->favicon));
            $favExtention = $request->file('favicon')->guessExtension();
            $favName = time() . '-' . $request->name . '.' . $favExtention;
            $request->file('favicon')->move(public_path('uploads'), $favName);
            $result->update(['favicon' => $favName]);
        }
        $gs = GeneralSetting::findOrFail(1);

        $result->update(array(
            'title' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->contact,
            'footer' => $request->footer,
            'copyright' => $request->copyright,
        ));

        if ($result) {
            return redirect()->back()->with('message', 'Updated Sucessfully!!');
        } else {
            return redirect()->back()->withErrors(['message' => 'Updation Failed!']);
        }
    }
}
