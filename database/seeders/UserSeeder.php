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
        $users = [
            'id' => 1,
            'name' => 'Gede Indra Adi Brata',
            'display_name' => 'Cupcakez',
            'email' => 'indrabrata599@gmail.com',
            'password' => Hash::make('password'),
        ];

        \App\Models\User::create($users);
    }
}
