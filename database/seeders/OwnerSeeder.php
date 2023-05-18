<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'owner1',
                'email' => 'owner1@test.com',
                'password' => Hash::make('11111111'),
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'name' => 'owner2',
                'email' => 'owner2@test.com',
                'password' => Hash::make('22222222'),
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'name' => 'owner3',
                'email' => 'owner3@test.com',
                'password' => Hash::make('33333333'),
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'name' => 'owner4',
                'email' => 'owner4@test.com',
                'password' => Hash::make('44444444'),
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'name' => 'owner5',
                'email' => 'owner5@test.com',
                'password' => Hash::make('55555555'),
                'created_at' => '2023/01/01 11:11:11'
            ],
            [
                'name' => 'owner6',
                'email' => 'owner6@test.com',
                'password' => Hash::make('66666666'),
                'created_at' => '2023/01/01 11:11:11'
            ]
        ]);
    }
}
