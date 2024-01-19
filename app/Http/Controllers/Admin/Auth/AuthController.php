<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\PasswordRessetTokens;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginView()
    {
        // dd(Hash::make('123456789'));
        if (Auth::check()) {
            return  back();
        }
        $layout = 'auth';
        return view('admin.auth.Login', compact('layout'));
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'password' => 'Account or password is incorrect!',
        ])->onlyInput('password');
    }
    public function ForgotPassword()
    {
        if (Auth::check()) {
            return  back();
        }
        $layout = 'auth';
        return view('admin.auth.ForgotPassword', compact('layout'));
    }
    public function SendMailForgotPassword(Request $request)
    {
        $request->validate([
            "email" => "required|email"
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $name = $user->full_name;
            $email = $user->email;
            $token = Str::random(64);
            // expired = 5m
            $expired = now()->addMinutes(5);
            $checkEmailExist = PasswordRessetTokens::where('email', $email)->first();
            if ($checkEmailExist) {
                PasswordRessetTokens::where('email', $email)->delete();
            }
            $checkInsertTokenToDB = PasswordRessetTokens::insert(["email" => $email, "token" => $token, 'expired' => $expired]);
            if (!$checkInsertTokenToDB) {
                return back()->withErrors([
                    'email' => 'System error, please try again!',
                ])->onlyInput('email');
            }
            $url = route('auth.resetPassword', ['email' => $email, 'token' => $token]);
            Mail::to($user->email)->send(new ResetPassword($name, $url));
            session()->flash(
                'success',
                'We sent an email to ' . substr($email, 0, 1) . '*******' . substr($email, strpos($email, '@'))
            );
            return redirect()->back();
        }
        return back()->withErrors([
            'email' => 'The account does not exist in the system!',
        ])->onlyInput('email');
    }
    public function resetPassword(Request $request)
    {

        if ($request->has('email') && $request->has('token')) {
            $checkToken = PasswordRessetTokens::where('email', $request->email)->first();
            if ($checkToken && $checkToken->token == $request->token && now()->lt($checkToken->expired)) {
                $layout = 'auth';
                return view('admin.auth.resetPassword', compact('layout'));
            }
        }
        return abort(404);
    }
    public function PostResetPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        $changePw = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        if ($changePw) {
            PasswordRessetTokens::where('email', $request->email)->delete();
            session()->flash(
                'success',
                'Password reset successful, please log in again'
            );
            return redirect()->route('auth.loginView');
        } else {
            return abort(500);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.loginView');
    }
}
