<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '米・雑穀',
                'sort_order' => 1,
            ],
            [
                'name' => '魚介類・水産加工品',
                'sort_order' => 2,
            ],
            [
                'name' => '精肉・肉加工品',
                'sort_order' => 3,
            ],
            [
                'name' => '野菜・きのこ',
                'sort_order' => 4,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => '白米',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => '玄米',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'アジ',
                'sort_order' => 3,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'イカ',
                'sort_order' => 4,
                'primary_category_id' => 2,
            ],
            [
                'name' => '牛肉',
                'sort_order' => 5,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'アジ',
                'sort_order' => 6,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'アスパラガス',
                'sort_order' => 7,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'かぼちゃ',
                'sort_order' => 8,
                'primary_category_id' => 4,
            ],
        ]);
    }
}
