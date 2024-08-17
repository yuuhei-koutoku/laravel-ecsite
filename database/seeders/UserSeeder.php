<?php

namespace Database\Seeders;

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
            'name' => 'ゲストユーザー',
            'email' => 'user1@example.com',
            'password' => Hash::make('11111111'),
            'created_at' => '2023/01/01 11:11:11',
        ]);
        DB::table('users')->insert([
            'name' => '山岸 智也',
            'email' => 'user2@example.com',
            'password' => Hash::make('22222222'),
            'created_at' => '2023/01/01 11:11:11',
        ]);
        DB::table('users')->insert([
            'name' => '加藤 さゆり',
            'email' => 'user3@example.com',
            'password' => Hash::make('33333333'),
            'created_at' => '2023/01/01 11:11:11',
        ]);
    }
}
