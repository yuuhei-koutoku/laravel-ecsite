<?php

namespace Database\Seeders;

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
                'name' => 'Apparel',
                'sort_order' => 1,
            ],
            [
                'name' => 'Towel',
                'sort_order' => 2,
            ],
            [
                'name' => 'Bag',
                'sort_order' => 3,
            ],
            [
                'name' => 'Accessory',
                'sort_order' => 4,
            ],
            [
                'name' => 'Other',
                'sort_order' => 5,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'T-shirt',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Hoodie',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Sweatshirt',
                'sort_order' => 3,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Jacket',
                'sort_order' => 4,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Cap',
                'sort_order' => 5,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Scarf Towel',
                'sort_order' => 6,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'Face Towel',
                'sort_order' => 7,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'Mini Towel',
                'sort_order' => 8,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'Tote Bag',
                'sort_order' => 9,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Shoulder Bag',
                'sort_order' => 10,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Rubber Band',
                'sort_order' => 11,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'Keychain',
                'sort_order' => 12,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'Badge',
                'sort_order' => 13,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'Sticker',
                'sort_order' => 14,
                'primary_category_id' => 5,
            ],
            [
                'name' => 'Calendar',
                'sort_order' => 15,
                'primary_category_id' => 5,
            ],
            [
                'name' => 'iPhone Case',
                'sort_order' => 16,
                'primary_category_id' => 5,
            ],
        ]);
    }
}
