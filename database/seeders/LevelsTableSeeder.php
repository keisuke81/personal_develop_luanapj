<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => '初級（120以上）',
        ];
        DB::table('levels')->insert($param);

        $param = [
            'id' => 2,
            'name' => '中級（100~119）',
        ];
        DB::table('levels')->insert($param);

        $param = [
            'id' => 3,
            'name' => '上級（99以下）',
        ];
        DB::table('levels')->insert($param);

        $param = [
            'id' => 4,
            'name' => '超上級（80以下）',
        ];
        DB::table('levels')->insert($param);

        $param = [
            'id' => 5,
            'name' => '特に指定なし',
        ];
        DB::table('levels')->insert($param);
    }
}

