<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class CartController extends Controller
{
    public function cartView(User $id){
        // if(Auth::user() == null) return redirect()->route('home');

        // tunggu bisa auth
        // $id = Auth::id;
        // $user = Auth::user();
          
        $user = \App\User::find($id);
        $cart = $user->Cart;

        return view('cart', [
            'user' => $user,
            'carts' => $cart
        ]);
    }
}
