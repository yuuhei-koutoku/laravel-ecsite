<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            [
                'user_id' => 1,
                'product_id' => 17,
                'quantity' => 1,
            ],
            [
                'user_id' => 1,
                'product_id' => 121,
                'quantity' => 2,
            ],
        ]);
    }
}
