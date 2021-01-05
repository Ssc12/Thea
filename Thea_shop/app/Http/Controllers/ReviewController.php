<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tea;
use Auth;

class ReviewController extends Controller
{
    public function comment(Request $request, Tea $tea){
        $reviews = $tea->Review;
        foreach ($reviews as $review) {
            if(Auth::id() == $review->id){
                return redirect('tea/'.$tea->id);
            }
        }

        $this->validate($request, [
            'rating' => 'required|min:1|max:5',
            'comment' => 'required',
        ]);

        $review = new \App\Review;
        $review->user_id = Auth::id();
        $review->tea_id = $tea->id;
        $review->rating = $request->rating;
        $review->review = $request->comment;
        $review->save();

        return redirect('tea/'.$tea->id);
    }
}
