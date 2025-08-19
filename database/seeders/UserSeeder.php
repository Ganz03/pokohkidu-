<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'arganapulungan@gmail.com',
            'password' => Hash::make('argana03'),
            'created_at' => now(),
            'updated_at' => now(),

            'id' => 2,
            'name' => 'admin',
            'email' => 'Agung@gmail.com',
            'password' => Hash::make('pokidmelejid'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}