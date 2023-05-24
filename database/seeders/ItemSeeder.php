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
            'name' => 'ボールペン',
            'type' => '1',
            'price'=>'200'
            

        ]);Item::create([
            'name' => 'ボールペン(赤)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'name' => 'ボールペン(青)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'name' => 'サインペン(赤)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'name' => 'サインペン(青)',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'name' => 'シャーペン',
            'type' => '1',
            'price'=>'200'

        ]);Item::create([
            'name' => '筆ペン',
            'type' => '1',
            'price'=>'240'

        ]);Item::create([
            'name' => '消しゴム',
            'type' => '1',
            'price'=>'220'

        ]);Item::create([
            'name' => '修正テープ',
            'type' => '1',
            'price'=>'240'

        ]);Item::create([
            'name' => '付箋',
            'type' => '1',
            'price'=>'120'

        ]);Item::create([
            'name' => '歯ブラシ',
            'type' => '2',
            'price'=>'120'

        ]);Item::create([
            'name' => '洗面コップ',
            'type' => '2',
            'price'=>'210'

        ]);Item::create([
            'name' => 'くし',
            'type' => '2',
            'price'=>'230'

        ]);Item::create([
            'name' => '歯磨き粉',
            'type' => '2',
            'price'=>'110'

        ]);Item::create([
            'name' => 'シャンプー(椿)',
            'type' => '2',
            'price'=>'530'

        ]);Item::create([
            'name' => 'シャンプー(ダイアン)',
            'type' => '2',
            'price'=>'500'

        ]);Item::create([
            'name' => 'シャンプー(YORU)',
            'type' => '2',
            'price'=>'430'

        ]);Item::create([
            'name' => 'シャンプー(ウルリス)',
            'type' => '2',
            'price'=>'310'

        ]);Item::create([
            'name' => 'リンス',
            'type' => '2',
            'price'=>'399'

        ]);Item::create([
            'name' => 'コンディショナー',
            'type' => '2',
            'price'=>'215'

        ]);Item::create([
            'name' => '湯呑み',
            'type' => '3',
            'price'=>'900'

        ]);Item::create([
            'name' => '茶請け',
            'type' => '3',
            'price'=>'250'

        ]);Item::create([
            'name' => '茶菓子',
            'type' => '3',
            'price'=>'230'

        ]);Item::create([
            'name' => 'グラス',
            'type' => '3',
            'price'=>'800'

        ]);Item::create([
            'name' => '菓子器',
            'type' => '3',
            'price'=>'200'

        ]);Item::create([
            'name' => 'ポット',
            'type' => '3',
            'price'=>'2300'

        ]);Item::create([
            'name' => 'アンケート用紙',
            'type' => '3',
            'price'=>'100'

        ]);Item::create([
            'name' => 'テレビ',
            'type' => '3',
            'price'=>'120000'

        ]);Item::create([
            'name' => 'テレビリモコン',
            'type' => '3',
            'price'=>'500'

        ]);Item::create([
            'name' => '帯',
            'type' => '3',
            'price'=>'200'

        ]);
    }
}
