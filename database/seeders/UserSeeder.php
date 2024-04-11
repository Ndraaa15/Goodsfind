<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [[
            'id' => 1,
            'name' => 'Gede Indra Adi Brata',
            'display_name' => 'Cupcakez',
            'email' => 'indrabrata599@gmail.com',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 2,
            'name' => 'John Doe',
            'display_name' => 'Johnzzz',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password'),
        ]];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
