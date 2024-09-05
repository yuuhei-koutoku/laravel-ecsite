<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inquiries')->insert([
            [
                'user_id' => 1,
                'admin' => 0,
                'message' => '注文した商品の返品は可能でしょうか？',
            ],
            [
                'user_id' => 1,
                'admin' => 1,
                'message' => "お問い合わせいただき、誠にありがとうございます。\n恐れ入りますが、当サイトでは商品の返品は承っておりません。\nお客様のご期待に沿うことができず、誠に申し訳ございません。\n\nその他、ご不明な点やご質問等がございましたら、どうぞお気軽にチャットにてご連絡くださいませ。\n何卒、よろしくお願い申し上げます。",
            ],
            [
                'user_id' => 1,
                'admin' => 0,
                'message' => "わかりました。\n教えてくださり、ありがとうございます。",
            ],
        ]);
    }
}
