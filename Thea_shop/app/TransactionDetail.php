<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    protected $fillable = ['transaction_id', 'tea_id', 'qty'];

    public function pizzas(){
        return $this->belongsTo('App\Tea');
    }
}
