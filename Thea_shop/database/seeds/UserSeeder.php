<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $user = new \App\User();
        $user->name = "Steven";
        $user->email = "steven@gmail.com";
        $user->password = Hash::make('steven');
        $user->gender = "Male";
        $user->address = "jalan kebon jeruk no.15a, jakarta barat";
        $user->phone_number = "087884567891";
        $user->role_id = 2;
        $user->save();
    
        // member
        $user = new \App\User();
        $user->name = "Darwis";
        $user->email = "darwis@gmail.com";
        $user->password = Hash::make('darwis');
        $user->gender = "Male";
        $user->address = "jalan kemanggisan no.23a, jakarta barat";
        $user->phone_number = "087881234567";
        $user->role_id = 1;
        $user->save();
    
        $user = new \App\User();
        $user->name = "Kily";
        $user->email = "kily@gmail.com";
        $user->password = Hash::make('kily12');
        $user->gender = "Female";
        $user->address = "jalan kemanggisan no.17a, jakarta barat";
        $user->phone_number = "087882234587";
        $user->role_id = 1;
        $user->save();    
    }
}
