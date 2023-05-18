<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@test.com',
            'password' => Hash::make('11111111'),
            'created_at' => '2023/01/01 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@test.com',
            'password' => Hash::make('22222222'),
            'created_at' => '2023/01/01 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@test.com',
            'password' => Hash::make('33333333'),
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}
