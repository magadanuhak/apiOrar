<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
            'title' => 'test' ,
            'description' => 'test',
            'image' => 'test',
            'user_id' => 1,
        ]);

    }
}
