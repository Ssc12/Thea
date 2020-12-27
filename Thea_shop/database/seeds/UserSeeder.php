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
        //
        $user = new \App\User();
        $user->name = "Darwis";
        $user->email = "darwis@gmail.com";
        $user->password = "darwis";
        $user->phone_number = "082355551647";
        $user->role_id = 1;
        $user->save();

        $user = new \App\User();
        $user->name = "Steven";
        $user->email = "steven@gmail.com";
        $user->password = "steven";
        $user->phone_number = "081255551647";
        $user->role_id = 2;
        $user->save();
    }
}
