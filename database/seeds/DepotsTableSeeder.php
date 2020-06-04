<?php

use Illuminate\Database\Seeder;

class DepotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depots')
            ->insert(['kind' => '1']);
        DB::table('depots')
            ->insert(['kind' => '2']);
        DB::table('depots')
            ->insert(['kind' => '3']);
        DB::table('depots')
            ->insert(['kind' => '4']);
        DB::table('depots')
            ->insert(['kind' => '5']);
        DB::table('depots')
            ->insert(['kind' => '6']);
    }
}
