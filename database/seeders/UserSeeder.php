<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'admin',
            'role' => 'admin',
            'phone' => '1231231233',
            'email' => 'admin@gmail.com',
            // 'status' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}