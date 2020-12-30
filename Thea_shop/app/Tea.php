<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
    //
    public function Cart(){
        $var = $this->belongsToMany(Tea::class,'carts','tea_id','user_id')->withPivot('quantity')->withTimestamps();
        return $var->pivot;
    }

    public function Review(){
        return $this->belongsToMany(User::class,'reviews','tea_id','user_id')->withPivot('rating','review')->withTimestamps();
    }

    public function Detail(){
        $var = $this->belongsToMany(Tea::class, 'transaction_details', 'tea_id', 'transcation_id')->withPivot('quantity')->withTimestamps();
        return $var->pivot;
    }
}
