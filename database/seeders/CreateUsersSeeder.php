<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            

            [

               'name'=>'User',

               'email'=>'user@user.com',
                'contactnumber' => '123456789',
               'password'=> bcrypt('123456'),

            ],

        ];

        foreach ($users as $key => $user) {

            User::create($user);

        }
    }
}