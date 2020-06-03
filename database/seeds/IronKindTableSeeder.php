<?php

use Illuminate\Database\Seeder;

class IronKindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iron_kind')
            ->insert(['iron_name' => '矽鋼片-混合']);
        DB::table('iron_kind')
            ->insert(['iron_name' => '鐵皮']);
        DB::table('iron_kind')
            ->insert(['iron_name' => '球化']);
        DB::table('iron_kind')
            ->insert(['iron_name' => '鐵丸']);
        DB::table('iron_kind')
            ->insert(['iron_name' => '矽鋼片-細']);
        DB::table('iron_kind')
            ->insert(['iron_name' => '矽鋼片-粗']);
    }
}
