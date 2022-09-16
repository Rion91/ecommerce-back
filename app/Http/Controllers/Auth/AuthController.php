<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::user()) {
            return redirect('/admin');
        }
        return view('auth.login');
    }

    public function postLoginForm(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

//        $credential = $request->only('email', 'password');
//        if (Auth::attempt($credential)){
//            if (\auth()->user()->is_admin == 'yes'){
//                return redirect('/admin');
//            }
//            return redirect()->back();
//        }
//        return redirect()->back()->withErrors('The provided credentials do not match our records.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

}
