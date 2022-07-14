<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact')->with('contacts', $contacts);
    }
    public function delete($id)
    {
        $result = Contact::where('id', $id)->first()->delete();
        if ($result)
            return redirect()->back()->with('message', 'Deleted Sucessfully !!');

        return redirect()->back()->withErrors(['message' => 'Error Deleting !']);
    }
}
