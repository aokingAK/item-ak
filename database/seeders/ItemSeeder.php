<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'user_id' =>'1',
            'name' => 'ボールペン',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'2',
            'name' => 'ボールペン(赤)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'3',
            'name' => 'ボールペン(青)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'4',
            'name' => 'サインペン(赤)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'5',
            'name' => 'サインペン(青)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'6',
            'name' => 'シャーペン',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'7',
            'name' => '筆ペン',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'8',
            'name' => '消しゴム',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'9',
            'name' => '修正テープ',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'10',
            'name' => '付箋',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'11',
            'name' => '歯ブラシ',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'12',
            'name' => '洗面コップ',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'13',
            'name' => 'くし',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'14',
            'name' => '歯磨き粉',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'15',
            'name' => 'シャンプー(椿)',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'16',
            'name' => 'シャンプー(ダイアン)',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'17',
            'name' => 'シャンプー(YORU)',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'18',
            'name' => 'シャンプー(ウルリス)',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'19',
            'name' => 'リンス',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'20',
            'name' => 'コンディショナー',
            'type' => '2',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'21',
            'name' => '湯呑み',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'22',
            'name' => '茶請け',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'23',
            'name' => '茶菓子',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'24',
            'name' => 'グラス',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'25',
            'name' => '菓子器',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'26',
            'name' => 'ポット',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'27',
            'name' => 'アンケート用紙',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'28',
            'name' => 'テレビ',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'29',
            'name' => 'テレビリモコン',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'user_id' =>'30',
            'name' => '帯',
            'type' => '3',
            'price'=>'200'

        ]);
    }
}
