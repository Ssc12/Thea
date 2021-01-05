<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use Auth;
use App\Tea;

class HomeController extends Controller
{
    public function updateTea($tea_id){
        $tea = Tea::where('id', $tea_id)->first();
        return view('admin.update', compact('tea'));
    }

    public function deleteTea($tea_id){
        $tea = Tea::where('id', $tea_id)->first();
        return view('admin.delete', compact('tea'));
    }

    public function addTea(){
        return view('admin.add');
    }

    public function viewAllUser(){
        $user = User::all();
        return view('admin.user', ['user' => $user]);
    }
}