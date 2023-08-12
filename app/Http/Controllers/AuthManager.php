<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
         return view('login');
    }
    function register(){
        return view('registration');
    }

    // post request controller
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentails = $request->only('email', 'password');
        if(Auth::attempt($credentails)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'Login details are not valid');
    }
    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if(!$user){
            return  redirect(route('register'))->with('error', 'Error registering user');
        }
        return redirect(route('login'))->with('success', 'registration was successful, login to access app');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
