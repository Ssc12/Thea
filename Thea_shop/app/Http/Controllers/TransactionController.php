<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;

class TransactionController extends Controller
{
    public function history()
    {
        $user = Auth::user();
        if($user == null) return redirect()->route('home');

        $transactions = \App\Order::where('user_id',$user->id)->get();

        return view('user.history',[
            'transactions' => $transactions
        ]);
    }

    public function details(Order $id){
        if(Auth::user() == null) return redirect()->route('home');

        return view('user.transaction_detail',[
            'order' => $id
        ]);

    }
}
