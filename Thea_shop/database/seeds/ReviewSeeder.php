<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $review = new \App\Review();
        $review->user_id=2;
        $review->tea_id=2;
        $review->rating=4;
        $review->review="Teh hitam ini memberikan khasiat yang baik setelah saya mengkonsumsinya secara rutin.";
        $review->save();

        $review = new \App\Review();
        $review->user_id=3;
        $review->tea_id=5;
        $review->rating=3;
        $review->review="Teh putih ini rasanya nikmat, namun harganya cukup mahal.";
        $review->save();
    }
}
