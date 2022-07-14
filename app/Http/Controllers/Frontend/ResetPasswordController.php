<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }
    public function index()
    {
        return view('front.auth.forgot-password');
    }
    public function send(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ?
            back()->with(['message' => __($status)]) : back()->withErrors(['email' => __($status)]);
    }
    public function resetView(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        return view('front.auth.reset-password', compact(['token', 'email']));
    }
    public function resetPassword(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.sign.in')->with('message', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
