<?php

namespace App\Http\Controllers;

use App\Tea;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function get(){
        $populars =  Tea::take(5)->get();
        $recommends = Tea::take(5)->get();

        return view('index',[
            'populars' => $populars,
            'recommends' => $recommends
        ]);
    }
}
