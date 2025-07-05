<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donor;


class AuthController extends Controller
{
    function login(){
        return view("bloodBridge.login");
    }

    function loginPost(Request $request){
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('dashboard'))->with('success', "Login Successfully ! ");
        }
        return redirect(route('login'))->with("error", "Login failed. Invalid Credentials !");
    }

    function register(){
        return view("bloodBridge.register");
    }
    
    function registerPost(Request $request){
        $request->validate([
            'fname'=> 'required',
            'lname'=> 'required',
            'nic'=> 'required',
            'dob'=> 'required',
            'email'=> 'required',
            'address'=> 'required',
            'contact'=> 'required',
            'username'=> 'required',
            'password'=> 'required'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), 
            'fname'    => $request->fname,
            'lname'    => $request->lname,
            'contact'  => $request->contact,
        ]);
        
        Donor::create([
            'user_id' => $user->user_id,
            'nic' => $request->nic,
            'dob' => $request->dob,
            'email' => $request->email,
            'address' => $request->address,

        ]);
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
