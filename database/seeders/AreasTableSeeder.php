<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 0,
            'name' => '未定',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 1,
            'name' => '東京',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 2,
            'name' => '神奈川',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 3,
            'name' => '埼玉',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 4,
            'name' => '千葉',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 5,
            'name' => '群馬',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 6,
            'name' => '栃木',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 7,
            'name' => '茨城',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 8,
            'name' => '静岡',
        ];
        DB::table('areas')->insert($param);
    }
}
