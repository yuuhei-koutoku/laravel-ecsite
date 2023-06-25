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
                'name' => '野菜・きのこ',
                'sort_order' => 1,
            ],
            [
                'name' => 'フルーツ・果物',
                'sort_order' => 2,
            ],
            [
                'name' => '水・ソフトドリンク',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'セット・詰め合わせ',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'サツマイモ',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => '豆類',
                'sort_order' => 3,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'にんにく',
                'sort_order' => 4,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'たまねぎ',
                'sort_order' => 5,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'とうもろこし',
                'sort_order' => 6,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'きのこ',
                'sort_order' => 7,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'トマト',
                'sort_order' => 8,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ジャガイモ',
                'sort_order' => 9,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'アスパラガス',
                'sort_order' => 10,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'にんじん',
                'sort_order' => 11,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'カット野菜',
                'sort_order' => 12,
                'primary_category_id' => 1,
            ],
            [
                'name' => '生姜',
                'sort_order' => 13,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ねぎ',
                'sort_order' => 14,
                'primary_category_id' => 1,
            ],
            [
                'name' => '山菜',
                'sort_order' => 15,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'らっきょう',
                'sort_order' => 16,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'かぼちゃ',
                'sort_order' => 17,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ごぼう',
                'sort_order' => 18,
                'primary_category_id' => 1,
            ],
            [
                'name' => '里芋',
                'sort_order' => 19,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'キャベツ',
                'sort_order' => 20,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ほうれん草',
                'sort_order' => 21,
                'primary_category_id' => 1,
            ],
            [
                'name' => '水煮野菜',
                'sort_order' => 22,
                'primary_category_id' => 1,
            ],
            [
                'name' => '大根',
                'sort_order' => 23,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ナス',
                'sort_order' => 24,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'レタス',
                'sort_order' => 25,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'キュウリ',
                'sort_order' => 26,
                'primary_category_id' => 1,
            ],
            [
                'name' => '白菜',
                'sort_order' => 27,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ニラ',
                'sort_order' => 28,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ブドウ',
                'sort_order' => 29,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'みかん',
                'sort_order' => 30,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'セット・詰め合わせ',
                'sort_order' => 31,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'いちご',
                'sort_order' => 32,
                'primary_category_id' => 2,
            ],
            [
                'name' => '桃',
                'sort_order' => 33,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'りんご',
                'sort_order' => 34,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'さくらんぼ',
                'sort_order' => 35,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'メロン',
                'sort_order' => 36,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'マンゴー',
                'sort_order' => 37,
                'primary_category_id' => 2,
            ],
            [
                'name' => '和梨',
                'sort_order' => 38,
                'primary_category_id' => 2,
            ],
            [
                'name' => '柿',
                'sort_order' => 39,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'スイカ',
                'sort_order' => 40,
                'primary_category_id' => 2,
            ],
            [
                'name' => '洋梨',
                'sort_order' => 41,
                'primary_category_id' => 2,
            ],
            [
                'name' => '栗',
                'sort_order' => 42,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ブルーベリー',
                'sort_order' => 43,
                'primary_category_id' => 2,
            ],
            [
                'name' => '梅',
                'sort_order' => 44,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'レモン',
                'sort_order' => 45,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'オレンジ',
                'sort_order' => 46,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'キウイフルーツ',
                'sort_order' => 47,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'パイナップル',
                'sort_order' => 48,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ライチ',
                'sort_order' => 49,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'イチジク',
                'sort_order' => 50,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'びわ',
                'sort_order' => 51,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'グレープフルーツ',
                'sort_order' => 52,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'パッションフルーツ',
                'sort_order' => 53,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'プラム',
                'sort_order' => 54,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'バナナ',
                'sort_order' => 55,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'すだち',
                'sort_order' => 56,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'あんず',
                'sort_order' => 57,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ザクロ',
                'sort_order' => 58,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ドラゴンフルーツ',
                'sort_order' => 59,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ドリアン',
                'sort_order' => 60,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'アボカド',
                'sort_order' => 61,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'じゃばら',
                'sort_order' => 62,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'かぼす',
                'sort_order' => 63,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'パパイヤ',
                'sort_order' => 64,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ゆず',
                'sort_order' => 65,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'マンゴスチン',
                'sort_order' => 66,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'ミラクルフルーツ',
                'sort_order' => 67,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'お茶・紅茶',
                'sort_order' => 68,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'コーヒー',
                'sort_order' => 69,
                'primary_category_id' => 3,
            ],
            [
                'name' => '水・炭酸水',
                'sort_order' => 70,
                'primary_category_id' => 3,
            ],
            [
                'name' => '炭酸飲料',
                'sort_order' => 71,
                'primary_category_id' => 3,
            ],
            [
                'name' => '野菜・果実飲料',
                'sort_order' => 72,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'スポーツドリンク',
                'sort_order' => 73,
                'primary_category_id' => 3,
            ],
            [
                'name' => '乳酸菌飲料',
                'sort_order' => 74,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'お酢飲料',
                'sort_order' => 75,
                'primary_category_id' => 3,
            ],
            [
                'name' => '植物性ミルク',
                'sort_order' => 76,
                'primary_category_id' => 3,
            ],
            [
                'name' => '甘酒',
                'sort_order' => 77,
                'primary_category_id' => 3,
            ],
            [
                'name' => '牛乳',
                'sort_order' => 78,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'ゼリー飲料',
                'sort_order' => 79,
                'primary_category_id' => 3,
            ],
            [
                'name' => '希釈用ドリンク',
                'sort_order' => 80,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'ココア・チョコレートドリンク',
                'sort_order' => 81,
                'primary_category_id' => 3,
            ],
            [
                'name' => 'スムージー',
                'sort_order' => 82,
                'primary_category_id' => 3,
            ],
        ]);
    }
}
