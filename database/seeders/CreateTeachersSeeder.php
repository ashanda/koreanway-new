<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class CreateTeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            

            [

               'name'=>'Teacher',

               'email'=>'teacher@teacher.com',

               'password'=> bcrypt('123456'),

            ],

        ];

        foreach ($users as $key => $user) {

            Teacher::create($user);

        }
    }
}
