<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function adminSignIn()
    {
        return view('admin.auth.auth');
    }
    public function adminSignInPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if ($admin !== null) {
            if ($admin->status == 0) {
                return  redirect()->route('admin.sign.in')->withErrors(['message' => 'Admin is blocked.']);
            }
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard');
            }
        }
        return redirect()->route('admin.sign.in')->withErrors(['message' => 'Wrong Credential']);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.sign.in');
    }
}
