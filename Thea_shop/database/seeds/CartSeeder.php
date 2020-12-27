<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cart = new \App\Cart();
        $cart->user_id=2;
        $cart->tea_id=2;
        $cart->quantity=1;
        $cart->save();

        $cart = new \App\Cart();
        $cart->user_id=2;
        $cart->tea_id=4;
        $cart->quantity=3;
        $cart->save();

        $cart = new \App\Cart();
        $cart->user_id=3;
        $cart->tea_id=5;
        $cart->quantity=2;
        $cart->save();

        $cart = new \App\Cart();
        $cart->user_id=3;
        $cart->tea_id=8;
        $cart->quantity=2;
        $cart->save();
    }
}
