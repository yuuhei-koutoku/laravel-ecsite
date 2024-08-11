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
                'name' => 'グリーンハーモニー',
                'information' => '新鮮な有機野菜を使った料理が楽しめる店。バラエティ豊かな野菜の中から、お好みの野菜を選んでカスタマイズすることができます。サラダやスープ、グリル野菜など、健康に配慮したメニューが揃っています。野菜愛好家やビーガンの方におすすめです。',
                'filename' => 'shop1.jpg',
                'is_selling' => true,
            ],
            [
                'owner_id' => 2,
                'name' => 'フルーツヘブン',
                'information' => '鮮やかなフルーツが豊富な店。季節ごとの旬のフルーツを使ったフレッシュジュース、フルーツサラダ、フルーツパフェなどが楽しめます。甘くて爽やかな味わいと共に、ビタミンやミネラルをたっぷり摂取できる一品ばかりです。フルーツ好きな人やデザート好きな人におすすめです。',
                'filename' => 'shop2.jpg',
                'is_selling' => true,
            ],
            [
                'owner_id' => 3,
                'name' => 'ドリンクオアシス',
                'information' => '天然水とヘルシーな飲み物が楽しめるドリンクスタンド。地元の天然水を使用した爽やかな天然水ジュースやフレッシュフルーツスムージーを提供しています。また、健康志向の人に人気のカルピスや烏龍茶も取り揃えています。自然の恵みを活かしたドリンクで、リフレッシュしたいときにぴったりの場所です。',
                'filename' => 'shop3.jpg',
                'is_selling' => true,
            ],
        ]);
    }
}
