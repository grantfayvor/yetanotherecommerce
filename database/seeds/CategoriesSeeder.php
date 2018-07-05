<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id' => 1,
            'name' => 'SHIRTS'
        ], [
            'id' => 2,
            'name' => 'SHOES'
        ], [
            'id' => 3,
            'name' => 'JEANS'
        ], [
            'id' => 4,
            'name' => 'SUITS'
        ]]);
    }
}
