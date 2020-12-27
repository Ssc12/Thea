<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //admin
        $temp = new \App\User();
        $temp->name = "Michael";
        $temp->role_id = 2;
        $temp->email = "Michael456@gmail.com";
        $temp->profile_pic = "image/profile/profile.png";
        $temp->password = Hash::make('michael456');
        $temp->dob = "";
        $temp->gender = "male";
        $temp->address = "jalan kebon jeruk no.15a, jakarta barat";
        $temp->phone_number = "087884567891";
        $temp->save();

        // member
        $temp = new \App\User();
        $temp->name = "James";
        $temp->role_id = 1;
        $temp->email = "james123@gmail.com";
        $temp->profile_pic = "image/profile/profile.png";
        $temp->password = Hash::make('james123');
        $temp->dob = "";
        $temp->gender = "male";
        $temp->address = "jalan kemanggisan no.23a, jakarta barat";
        $temp->phone_number = "087881234567";
        $temp->save();

        $temp = new \App\User();
        $temp->name = "Cindy";
        $temp->role_id = 1;
        $temp->email = "cindy789@gmail.com";
        $temp->profile_pic = "image/profile/profile.png";
        $temp->password = Hash::make('cindy789');
        $temp->dob = "";
        $temp->gender = "female";
        $temp->address = "jalan kemanggisan no.17a, jakarta barat";
        $temp->phone_number = "087882234587";
        $temp->save();

        // tea seeder
        $temp = new \App\Tea;
        $temp->name = "Teh Hijau";
        $temp->price = 10000;
        $temp->description = "Daun Teh Hijau yang berkhasiat";
        $temp->image = "image/tea/teh_hijau.jpg";
        $temp->stock = 100;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Hitam";
        $temp->price = 11000;
        $temp->description = "Daun Teh Hitam yang berkhasiat";
        $temp->image = "image/tea/teh_hitam.jpg";
        $temp->stock = 80;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Oolong";
        $temp->price = 12000;
        $temp->description = "Daun Teh Oolong yang berkhasiat";
        $temp->image = "image/tea/teh_oolong.jpg";
        $temp->stock = 100;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Daun Salam";
        $temp->price = 13000;
        $temp->description = "Teh Daun Salam yang berkhasiat";
        $temp->image = "image/tea/teh_salam.jpg";
        $temp->stock = 110;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Putih";
        $temp->price = 25000;
        $temp->description = "Daun Teh Putih yang berkhasiat";
        $temp->image = "image/tea/teh_putih.jpg";
        $temp->stock = 50;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Binahong";
        $temp->price = 13000;
        $temp->description = "Teh Daun Binahong yang berkhasiat";
        $temp->image = "image/tea/teh_binahong.jpg";
        $temp->stock = 100;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Rosella";
        $temp->price = 14000;
        $temp->description = "Daun Teh Rosella yang berkhasiat";
        $temp->image = "image/tea/teh_rosella.jpg";
        $temp->stock = 90;
        $temp->save();

        $temp = new \App\Tea;
        $temp->name = "Teh Melati";
        $temp->price = 14000;
        $temp->description = "Daun Teh Melati yang berkhasiat";
        $temp->image = "image/tea/teh_melati.jpg";
        $temp->stock = 85;
        $temp->save();

        // cart seeder
        $temp = new \App\Cart;
        $temp->user_id=2;
        $temp->tea_id=2;
        $temp->quantity=1;
        $temp->save();

        $temp = new \App\Cart;
        $temp->user_id=2;
        $temp->tea_id=4;
        $temp->quantity=3;
        $temp->save();

        $temp = new \App\Cart;
        $temp->user_id=3;
        $temp->tea_id=5;
        $temp->quantity=2;
        $temp->save();

        $temp = new \App\Cart;
        $temp->user_id=3;
        $temp->tea_id=8;
        $temp->quantity=2;
        $temp->save();

        // review seeder
        $temp = new \App\Review;
        $temp->user_id=2;
        $temp->tea_id=2;
        $temp->rating=4;
        $temp->review="Teh hitam ini memberikan khasiat yang baik setelah saya mengkonsumsinya secara rutin.";
        $temp->save();

        $temp = new \App\Review;
        $temp->user_id=3;
        $temp->tea_id=5;
        $temp->rating=3;
        $temp->review="Teh putih ini rasanya nikmat, namun harganya cukup mahal.";
        $temp->save();
    }
}
