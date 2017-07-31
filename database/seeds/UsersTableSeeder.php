<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'login' => 'admin',
                'password' => bcrypt('admin'),
                'username' => 'Jack Shepard',
                'email' => 'grin9226@gmail.com',
            ],
            [
                'login' => 'moder',
                'password' => bcrypt('moder'),
                'username' => 'Kate Austin',
                'email' => 'kidgiftshop@gmail.com',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
