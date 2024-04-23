<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
                'name'=>'First user',
                'email'=>'firstuser@gmail.com',
                'type'=>1,
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Second user',
                'email'=>'seconduser@gmail.com',
                'type'=>1,
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Third user',
                'email'=>'thirduser@gmail.com',
                'type'=>1,
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Admin user',
                'email'=>'admin@gmail.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
            ],

        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
