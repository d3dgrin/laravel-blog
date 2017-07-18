<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'login' => 'admin',
            'email' => 'grin9226@gmail.com',
            'password' => bcrypt('motherfucker'),
        ]);
    }
}
