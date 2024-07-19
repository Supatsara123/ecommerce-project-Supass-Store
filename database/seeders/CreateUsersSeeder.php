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
        // $users = [
        //     [
        //         'nickname' => 'Admin',
        //         'email' => 'admin@admin.com',
        //         'password' => bcrypt('1234')
        //     ],
        //     [
        //         'nickname' => 'Supatsara Bangnimnoi',
        //         'email' => 'user@user.com',
        //         'password' => bcrypt('1234')
        //     ]
        // ];

        // foreach($users as $user){
        //     User::create($user);
        // }

        User::factory(10)->create();
    }
}
