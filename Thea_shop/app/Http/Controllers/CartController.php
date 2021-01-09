<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Tea;

class CartController extends Controller
{
    public function cartView(){
        if(Auth::user() == null) return redirect()->route('home');

        $user = Auth::user();
        $carts = $user->Cart;

        foreach ($carts as $cart) {
            $tea = Tea::find($cart->pivot->tea_id);
            $teaStock = $tea->stock;
            if($cart->pivot->quantity > $teaStock){
                $cart->pivot->quantity = $teaStock;
                $cart->pivot->update();
            }
        }

        $total=0;

        foreach ($carts as $cart) {
            $total = $total+ ($cart->price * $cart->pivot->quantity);
        }

        return view('cart', [
            'user' => $user,
            'carts' => $carts,
            'total'=> $total
        ]);
    }

    public function addToCart($teaId,Request $request){
        if(Auth::user() == null) return redirect()->route('home');

        $tea = Tea::find($teaId);
        $teaStock = $tea->stock; 

        $this->validate($request, [
            'qty'=>'required|numeric|min:1|max:'.$teaStock
        ]);
        
        $user = Auth::user();
        $carts = $user->Cart;
        $checkCart=null;

        foreach ($carts as $cart) {
            if($cart->pivot->tea_id == $teaId){
                $checkCart = $cart;
            }
        }
    
        if($checkCart == null){
            $cart = new \App\Cart();
            $cart->user_id = $user->id;
            $cart->tea_id = $teaId;
            $cart->quantity = $request->qty;
            $cart->save();    
        }else{
            foreach ($carts as $cart) {
                if($cart->pivot->tea_id == $teaId){
                    $cart->pivot->quantity = $request->qty + $checkCart->pivot->quantity;
                    $cart->pivot->update();
                }
            }
        }
        
        return redirect()->route('cart');
    }

    public function updateCart($teaId,Request $request){
        if(Auth::user() == null) return redirect()->route('home');

        $tea = Tea::find($teaId);
        $teaStock = $tea->stock; 
       
        $this->validate($request, [
            'qty'=>'required|numeric|min:1|max:'.$teaStock
        ]);

        $user = Auth::user();
        $carts = $user->Cart;

            foreach ($carts as $cart) {
                if($cart->pivot->tea_id == $teaId){
                    $cart->pivot->quantity = $request->qty;
                    $cart->pivot->update();
                }
            }
       
        return redirect()->route('cart');
    }

    public function deleteCart($teaId){
        if(Auth::user() == null) return redirect()->route('home');

        $user = Auth::user();
        $carts = $user->Cart;

            foreach ($carts as $cart) {
                if($cart->pivot->tea_id == $teaId){
                    $cart->pivot->delete();
                }
            }
       
        return redirect()->route('cart');
    }

    public function deleteAllFromCart(){
        if(Auth::user() == null) return redirect()->route('home');

        $user = Auth::user();
        $carts = $user->Cart;

            foreach ($carts as $cart) {
                 $cart->pivot->delete();
            }
       
        return redirect()->route('cart');
    }

    public function checkoutCart(){
            // kemungkinan akan dihapus beserta method func yang menggunakan method post
           if(Auth::user() == null) return redirect()->route('home');

           $user = Auth::user();
           $carts = $user->Cart;

           $order = new \App\Order;
           $order->user_id = $user->id;
           $order->total_price = 0;
           $order->save();
           $total=0;
   
           foreach($carts as $cart){
               $teaStock =  $cart->stock;
               $detail = new \App\Detail;
               $detail->transaction_id = $order->id;
               $detail->tea_id = $cart->pivot->tea_id;
               $detail->quantity = $cart->pivot->quantity;
               $detail->save();

               $total=$total + ($cart->price * $detail->quantity);

               $cart->stock = $teaStock - $detail->quantity;
               $cart->update();
               $cart->pivot->delete();
           }

           $order->total_price = $total;
           $order->save();

           return redirect()->route('cart');
    }
}
