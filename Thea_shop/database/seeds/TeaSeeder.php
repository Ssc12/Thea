<?php

use Illuminate\Database\Seeder;

class TeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tea = new \App\Tea();
        $tea->name = "Black Tea";
        $tea->price = "15000";
        $tea->description = "15000 per 10bag";
        $tea->stock = 100;
        $tea->image = "storage/tea/Black Tea/black tea.jpg";
        $tea->save();
    }
}
