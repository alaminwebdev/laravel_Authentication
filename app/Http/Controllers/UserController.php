<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('users.home');
    }
    public function dashboard()
    {
        return view('users.dashboard');
    }
    public function login()
    {
        return view('users.login');
    }
    public function login_submit(Request $request)
    {
        //dd($request->input());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('email',$request->email);
            // $user = Auth::user();
            // echo $user;
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registration()
    {
        return view('users.registration');
    }
    public function registration_submit(Request $request)
    {
        //dd($request->input());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'retype_password' => 'required'
        ]);
        $users = User::where('email',$request->email)->first();
        if($users){
            return redirect()->back()->with('danger', 'Email are already exist !'); 
        }
        //generate a hash value as token from user plaintext name
        $token = hash('sha256', $request->name);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->status = 'pending';
        $data->token = $token;
        $data->save();

        $verification_url = url('registration/verify/' . $token . '/' . $request->email);
        //dd($verification_url);
        $subject = 'Registration confirmation';
        $message = $verification_url;
        Mail::to($request->email)->send(new UserMail($subject, $message));
        return redirect()->route('home')->with('success', 'Verification link are send successfully , Please verify.');
    }
    public function registration_verify($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        //dd($user);
        if (!$user) {
            return redirect()->route('registration')->with('danger', 'Something went wrong , User not found !');
        }
        $user->status = 'active';
        $user->token = '';
        $user->update();
        return redirect()->route('dashboard')->with('success', 'Verifaction is successfull !');
    }

    public function forget_password()
    {
        return view('users.forget_password');
    }
    public function forget_password_submit(Request $request)
    {
        //dd($request->input());
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'The provided email do not match our records.',
            ])->onlyInput('email');
        }

        $token = hash('sha256', 'resetpassword');
        $user->token = $token;
        $user->update();

        $reset_url = url('reset/password/'.$token.'/'.$request->email);

        $subject = 'Reset password';
        Mail::to($request->email)->send(new UserMail($subject,$reset_url));
        return redirect()->back()->with('success','Password reset email are sent successfully ! Please check your mail.');

    }

    public function reset_password($token,$email){
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            return redirect()->route('login')->with('danger', 'Sorry ! This link are not valid !');
        }else{
            return view('users.reset_password', compact('token', 'email'));
        }
        

    }
    public function reset_password_submit(Request $request){
        $request->validate([
            'password' => 'required | min:5'
        ]);
        $user = User::where('token', $request->token)->where('email', $request->email)->first();
        $user->token = '';
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->route('login')->with('success', 'Password reset successfully !');

    }
    public function logout()
    {
        // this means that the admin was logged in.
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            session()->invalidate();
            return redirect()->route('login')->with('success', "Logout successfully");
        }
        return redirect()->route('login');
    }
}
