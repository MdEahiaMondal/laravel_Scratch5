<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

           [
               'name' => 'eahia',
               'email' => 'admin@gmail.com',
               'password' => bcrypt('12345678'),
               'phone' => '01521414629',
               'avatar' => 'default.png',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],

           [
               'name' => 'khan',
               'email' => 'admin250@gmail.com',
               'password' => bcrypt('12345678'),
               'phone' => '01720240475',
               'avatar' => 'default.png',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],

           ]);
    }
}
