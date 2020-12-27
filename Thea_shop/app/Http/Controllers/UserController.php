<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
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
        if($user == null)return redirect()->route('login');
        
        Auth::login($user);
        return redirect()->route('home');
            
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

        Auth::login($user);

        return redirect()->route('edit_profile');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function profile(){
        $user = Auth::user();
        if($user == null) return redirect()->route('home');

        return view('user.profile.profile',[
            'user' => $user,
        ]);
    } 

    public function editProfile(){
        $user = Auth::user();
        if($user == null) return redirect()->route('home');

        return view('user.profile.edit_profile',[
            'user' => $user,
        ]);
    }

    public function saveProfile(Request $request){
        $user = Auth::user();
        if($user == null) return redirect()->route('home');

        $this->validate($request, [
            'dob' => 'date_format:Y-m-d|before:today',
            'phone_number' => 'numeric',
            'picture' => 'mimes:jpg,jpeg,png'
        ]);

        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        if($request->picture){
            if($user->profile_pic != null) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $user->profile_pic = $request->file('picture')->store('/profile/'.$user->name, 'public');
        }
        $user->save();

        return redirect()->route('profile');
    }
}
