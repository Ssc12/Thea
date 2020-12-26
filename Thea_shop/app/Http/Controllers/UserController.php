<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    //
    public function loginForm(){
        if(Auth::user() != null) return redirect()->route('home');
        return view('login');
    }

    public function registerForm(){
        if(Auth::user() != null) return redirect()->route('home');
        return view('register');
    }

    public function login(Request $request){
        if(Auth::user() != null) return redirect()->route('home');

        $this->validate($request, [
            'email' => 'required|min:4',
            'password' => 'required|min:6',
        ]);

        $user = \App\User::where('email',$request->email)->where('password',$request->password)->first();
        Auth::login($user);
            
        if(Auth::user()){
            return redirect()->route('home');
        }else 
            return redirect()->route('login');
    }

    public function register(Request $request){
        if(Auth::user() != null) return redirect()->route('home');

        $this->validate($request, [
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|numeric'
        ]);

        $user = new \App\User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = 1;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
