<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => '鈴木 次郎',
                'email' => 'owner1@test.com',
                'password' => Hash::make('11111111'),
                'created_at' => '2023/01/01 11:11:11',
            ],
            [
                'name' => '青山 桃子',
                'email' => 'owner2@test.com',
                'password' => Hash::make('22222222'),
                'created_at' => '2023/01/01 11:11:11',
            ],
            [
                'name' => '山岸 翼',
                'email' => 'owner3@test.com',
                'password' => Hash::make('33333333'),
                'created_at' => '2023/01/01 11:11:11',
            ],
        ]);
    }
}
