<?php

use Illuminate\Database\Seeder;


class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'ĐỒ NAM',
                'slug'=>'do_nam',
                'status'=>1
            ],
            [
                'name'=>'ĐỒ NỮ',
                'slug'=>'do_nu',
                'status'=>1
            ],
            [
                'name'=>'ĐỒ ĐÔI',
                'slug'=>'do_doi',
                'status'=>1
            ],
            [
                'name'=>'ÁO KHOÁC',
                'slug'=>'ao_khoac',
                'status'=>1
            ],
            [
                'name'=>'PHỤ KIỆN',
                'slug'=>'phu_kien',
                'status'=>1
            ]
        ];
        DB::table('category')->insert($data);
    }
}
