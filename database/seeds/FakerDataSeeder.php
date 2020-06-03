<?php

use Illuminate\Database\Seeder;

class FakerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert([
            'company_name' => 'OOXX有限公司',
            'person_name' => '王先生',
            'address' => '台中市北區',
            'phone' => '0912345678',
            'identity' => 'supply',
            'companyId' => '98767761',
            'remarks' => '他家狗很可愛',                
        ]);
        DB::table('client')->insert([
            'company_name' => '我是買家有限公司',
            'person_name' => '劉小姐',
            'address' => '台南市善化區的88888',
            'phone' => '0987654321',
            'identity' => 'demand',
            'companyId' => '11111111',
            'remarks' => '他家的貓很可愛',                
        ]);
    }
}
