<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Auth;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => ['logout', 'userLogout']]);
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.sign.in');
    }

    public function userSignIn()
    {
        return view('front.auth.auth');
    }

    public function userSignInPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user !== null) {
            // if ($user->email_verified_at == Null) {
            //     Auth::guard('web')->logout();
            //     return  redirect()->route('user.sign.in')->withErrors(['message' => 'Please Verify your Email First!']);
            // }
            if ($user->status == 0) {
                return  redirect()->route('user.sign.in')->withErrors(['message' => 'User is blocked by admin.']);
            }
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            }
        }
        return redirect()->route('user.sign.in')->withErrors(['message' => 'Wrong Credential']);
    }

    public function userSignUp()
    {
        return view('front.auth.auth');
    }

    public function userSignUpPost(UserAuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => '0',
            'password' => Hash::make($request->confirm_password),
        ]);
        if ($user) {
            event(new Registered($user));
            return redirect()->route('user.sign.in')->with('message', 'Sign Up Successfully. Login Now!!');
        } else {
            return redirect()->route('user.sign.up')->withErrors(['message' => 'Error Creating Account !']);
        }
    }
}
