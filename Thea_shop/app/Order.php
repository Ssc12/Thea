<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'transaction_orders';

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Detail(){
        return $this->belongsToMany(Tea::class, 'transaction_details', 'transaction_id', 'tea_id')->withPivot('quantity')->withTimestamps();
        
    }
}
