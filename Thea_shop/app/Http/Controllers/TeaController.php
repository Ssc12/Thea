<?php

namespace App\Http\Controllers;

use App\Review;
use App\Tea;
use Illuminate\Http\Request;

class TeaController extends Controller
{
    public function search(Request $request){
        $search = $request->get('q');
        $teas = Tea::where('name','like','%'.$search.'%')
                        ->orWhere('price','=','%'.$search.'%')->get();

        return view('search', compact('teas'));
    }

    public function detail(Tea $tea){
        
        $reviews = $tea->Review;
    
        $rating = 0;

        if($reviews->count() != 0){
            
            foreach($reviews as $review){
                $rating += $review->pivot->rating;
            }

            $rating /= $reviews->count();
        }

        return view('tea.detail',compact('tea','rating','reviews'));
    }
}
