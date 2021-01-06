<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
    //
    public function Cart(){ 
        return $this->belongsToMany(User::class,'carts','tea_id','user_id')->withPivot('quantity')->withTimestamps();
    }

    public function Review(){
        return $this->belongsToMany(User::class,'reviews','tea_id','user_id')->withPivot('rating','review')->withTimestamps();
    }

    public function Detail(){
        return $this->belongsToMany(Order::class, 'transaction_details', 'tea_id', 'transcation_id')->withPivot('quantity')->withTimestamps();
    }

    public function getRatingAttribute(){
        $reviews = $this->Review;

        $rating = 0;

        if($reviews->count() != 0){
            
            foreach($reviews as $review){
                $rating += $review->pivot->rating;
            }

            $rating /= $reviews->count();
        }

        return $rating;
    }

    protected $fillable = [
        'name', 'price', 'description', 'image', 'stock'
    ];
}
