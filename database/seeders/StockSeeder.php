<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 138; $i++) {
            DB::table('t_stocks')->insert([
                [
                    'product_id' => $i + 1,
                    'user_id' => null,
                    'type' => 1,
                    'quantity' => 50,
                ],
            ]);
        }
    }
}
