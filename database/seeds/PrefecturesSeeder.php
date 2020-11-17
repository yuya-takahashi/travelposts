<?php

use Illuminate\Database\Seeder;

class PrefecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            ['prefecture_id' => 1, 'prefecture' => '北海道'],
            ['prefecture_id' => 2, 'prefecture' => '青森県'],
            ['prefecture_id' => 3, 'prefecture' => '岩手県'],
            ['prefecture_id' => 4, 'prefecture' => '宮城県'],
            ['prefecture_id' => 5, 'prefecture' => '秋田県'],
            ['prefecture_id' => 6, 'prefecture' => '山形県'],
            ['prefecture_id' => 7, 'prefecture' => '福島県'],
            ['prefecture_id' => 8, 'prefecture' => '茨城県'],
            ['prefecture_id' => 9, 'prefecture' => '栃木県'],
            ['prefecture_id' => 10, 'prefecture' => '群馬県'],
            ['prefecture_id' => 11, 'prefecture' => '埼玉県'],
            ['prefecture_id' => 12, 'prefecture' => '千葉県'],
            ['prefecture_id' => 13, 'prefecture' => '東京都'],
            ['prefecture_id' => 14, 'prefecture' => '神奈川県'],
            ['prefecture_id' => 15, 'prefecture' => '新潟県'],
            ['prefecture_id' => 16, 'prefecture' => '富山県'],
            ['prefecture_id' => 17, 'prefecture' => '石川県'],
            ['prefecture_id' => 18, 'prefecture' => '福井県'],
            ['prefecture_id' => 19, 'prefecture' => '山梨県'],
            ['prefecture_id' => 20, 'prefecture' => '長野県'],
            ['prefecture_id' => 21, 'prefecture' => '岐阜県'],
            ['prefecture_id' => 22, 'prefecture' => '静岡県'],
            ['prefecture_id' => 23, 'prefecture' => '愛知県'],
            ['prefecture_id' => 24, 'prefecture' => '三重県'],
            ['prefecture_id' => 25, 'prefecture' => '滋賀県'],
            ['prefecture_id' => 26, 'prefecture' => '京都府'],
            ['prefecture_id' => 27, 'prefecture' => '大阪府'],
            ['prefecture_id' => 28, 'prefecture' => '兵庫県'],
            ['prefecture_id' => 29, 'prefecture' => '奈良県'],
            ['prefecture_id' => 30, 'prefecture' => '和歌山県'],
            ['prefecture_id' => 31, 'prefecture' => '鳥取県'],
            ['prefecture_id' => 32, 'prefecture' => '島根県'],
            ['prefecture_id' => 33, 'prefecture' => '岡山県'],
            ['prefecture_id' => 34, 'prefecture' => '広島県'],
            ['prefecture_id' => 35, 'prefecture' => '山口県'],
            ['prefecture_id' => 36, 'prefecture' => '徳島県'],
            ['prefecture_id' => 37, 'prefecture' => '香川県'],
            ['prefecture_id' => 38, 'prefecture' => '愛媛県'],
            ['prefecture_id' => 39, 'prefecture' => '高知県'],
            ['prefecture_id' => 40, 'prefecture' => '福岡県'],
            ['prefecture_id' => 41, 'prefecture' => '佐賀県'],
            ['prefecture_id' => 42, 'prefecture' => '長崎県'],
            ['prefecture_id' => 43, 'prefecture' => '熊本県'],
            ['prefecture_id' => 44, 'prefecture' => '大分県'],
            ['prefecture_id' => 45, 'prefecture' => '宮崎県'],
            ['prefecture_id' => 46, 'prefecture' => '鹿児島県'],
            ['prefecture_id' => 47, 'prefecture' => '沖縄県'],
        ]);
    }
}

