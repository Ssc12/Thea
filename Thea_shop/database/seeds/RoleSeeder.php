<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $temp = new \App\Role();
        $temp->role_name = "Member";
        $temp->save();
        
        $temp = new \App\Role();
        $temp->role_name = "Admin";
        $temp->save();
    }
}
