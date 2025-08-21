<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'rizky_sulaeman',
            'email' => 'rizky_sulaeman@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::create([
            'name' => 'testuser',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('testpass@123'),
        ]);
    }
}
