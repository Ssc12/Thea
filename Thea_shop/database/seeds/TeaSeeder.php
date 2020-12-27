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
        $tea->name = "Teh Hijau";
        $tea->price = 10000;
        $tea->description = "Daun Teh Hijau yang berkhasiat, Rp.10000 per bag (50 gram)";
        $tea->image = "image/tea/teh_hijau.jpg";
        $tea->stock = 100;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Hitam";
        $tea->price = 11000;
        $tea->description = "Daun Teh Hitam yang berkhasiat, Rp.11000 per bag (50 gram)";
        $tea->image = "image/tea/teh_hitam.jpg";
        $tea->stock = 80;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Oolong";
        $tea->price = 12000;
        $tea->description = "Daun Teh Oolong yang berkhasiat, Rp.12000 per bag (50 gram)";
        $tea->image = "image/tea/teh_oolong.jpg";
        $tea->stock = 100;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Daun Salam";
        $tea->price = 13000;
        $tea->description = "Teh Daun Salam yang berkhasiat, Rp.13000 per bag (50 gram)";
        $tea->image = "image/tea/teh_salam.jpg";
        $tea->stock = 110;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Putih";
        $tea->price = 25000;
        $tea->description = "Daun Teh Putih yang berkhasiat, Rp.25000 per bag (50 gram)";
        $tea->image = "image/tea/teh_putih.jpg";
        $tea->stock = 50;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Binahong";
        $tea->price = 13000;
        $tea->description = "Teh Daun Binahong yang berkhasiat, Rp.13000 per bag (50 gram)";
        $tea->image = "image/tea/teh_binahong.jpg";
        $tea->stock = 100;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Rosella";
        $tea->price = 14000;
        $tea->description = "Daun Teh Rosella yang berkhasiat, Rp.14000 per bag (50 gram)";
        $tea->image = "image/tea/teh_rosella.jpg";
        $tea->stock = 90;
        $tea->save();

        $tea = new \App\Tea();
        $tea->name = "Teh Melati";
        $tea->price = 14000;
        $tea->description = "Daun Teh Melati yang berkhasiat, Rp.14000 per bag (50 gram)";
        $tea->image = "image/tea/teh_melati.jpg";
        $tea->stock = 85;
        $tea->save();
    }
}
