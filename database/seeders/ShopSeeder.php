<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'Rhythm Retails',
                'information' => '「Rhythm Retails」では、ライブイベントの興奮を感じられる各種オフィシャルグッズを提供しています。限定アイテムやアーティストコラボ商品も豊富に取り揃え、ファンにはたまらない一品が見つかります。',
                'filename' => 'shop1.jpg',
                'is_selling' => true,
            ],
            [
                'owner_id' => 2,
                'name' => 'Echo Merch',
                'information' => '「Echo Merch」では、音楽とファッションを融合させたグッズを展開しており、特に若者に人気です。オンライン限定でプレミアム商品も随時リリースされています。',
                'filename' => 'shop2.jpg',
                'is_selling' => true,
            ],
            [
                'owner_id' => 3,
                'name' => 'Festival Faves',
                'information' => 'フェスシーズンにぴったりのアパレルやアクセサリーを中心に扱う「Festival Faves」。フェスでのおしゃれを完璧にするためのアイテムが揃っています。',
                'filename' => 'shop3.jpg',
                'is_selling' => true,
            ],
        ]);
    }
}
