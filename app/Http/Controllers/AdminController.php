<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_login()
    {
        return view('admin.admin_login');
    }
    public function admin_login_submit(Request $request)
    {
        // dd($request->input());
        // email->admin@gmail.com
        // password->admin
        // dd(Hash::make('admin'));
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]);
            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                $request->session()->put('email', $request->email);
                // $user = Auth::user();
                // echo $user;
                return redirect()->route('admin_dashboard');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        // if http method without post
        return redirect()->route('admin_login');
    }
    public function admin_dashboard()
    {
        return view('admin.admin_dashboard');
    }
    public function admin_settings()
    {
        return view('admin.admin_settings');
    }
    public function admin_logout()
    {
        // this means that the admin was logged in.
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            session()->invalidate();
            return redirect()->route('admin_login')->with('success', "Logout successfully");
        }
        return redirect()->route('admin_login');
    }
}
