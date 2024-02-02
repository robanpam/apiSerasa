<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Neisya',
            'dob' => '2004-12-25',
            'phone' => '085299980356',
            'email' => 'neisyaedu@gmail.com',
            'password' => 'user1',
            'role' => '1'
        ]);
    }
}
