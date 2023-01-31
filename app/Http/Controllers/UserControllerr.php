<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserControllerr extends Controller
{
    public function index(){
        return view('home');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function login(){
        return view('login');
    }
    public function registration(){
        return view('registration');
    }
    public function registration_submit(Request $request){
        //dd($request->input());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'retype_password' => 'required'
        ]);
        //generate a hash value as token from user plaintext name
        $token = hash('sha256', $request->name);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->status = 'pending';
        $data->token = $token;
        $data->save();

        $verification_url = url('registration/verify/'.$token.'/'.$request->email);
        //dd($verification_url);
        $subject = 'Registration confirmation';
        $message = $verification_url;
        Mail::to($request->email)->send(new UserMail($subject, $message));
        echo "Email is sent";
    }
    public function forget_password(){
        return view('forget_password');
    }


}
