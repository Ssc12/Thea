<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $transaction = new \App\Order();
        $transaction->user_id = 2;
        $transaction->save();

        $detail = new \App\Detail();
        $detail->transaction_id = $transaction->id;
        $detail->tea_id = 1;
        $detail->quantity = 10;
        $detail->save();

        $transaction->total_price = 100000;
        $transaction->save();
    }
}
