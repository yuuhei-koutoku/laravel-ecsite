<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'filename' => 'no_image.jpg',
                'title' => '画像なし',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product1.jpg',
                'title' => 'たまねぎ',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product2.jpg',
                'title' => 'にんじん',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product3.jpg',
                'title' => 'ピーマン',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product4.jpg',
                'title' => 'なす',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product5.jpg',
                'title' => 'みかん',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product6.jpg',
                'title' => 'りんご',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product7.jpg',
                'title' => 'ぶどう',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product8.jpg',
                'title' => 'いちご',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product9.jpg',
                'title' => 'コーラ',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product10.jpg',
                'title' => 'チョコレートスムージー',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product11.jpg',
                'title' => '紅茶',
            ],
            [
                'owner_id' => 1,
                'filename' => 'product12.jpg',
                'title' => 'ミネラルウォーター',
            ],
        ]);
    }
}
