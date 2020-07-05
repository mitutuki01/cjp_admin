<?php

use Illuminate\Database\Seeder;

class StockTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        DB::table('mst_products')->insert([
            'product_id' => 1,
            'name' => 'モデラート',
            'image' => '',
        ]);
        DB::table('mst_products')->insert([
            'product_id' => 2,
            'name' => '酒器だるま',
            'image' => '',
        ]);

        DB::table('mst_genres')->insert([
            'genre_id' => 1,
            'name' => 'EC',
        ]);
        DB::table('mst_genres')->insert([
            'genre_id' => 2,
            'name' => 'カタログ',
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'genre_id' => 1,
            'stock' => 10,
        ]);
        DB::table('stocks')->insert([
            'product_id' => 1,
            'genre_id' => 2,
            'stock' => 5,
        ]);
        DB::table('stocks')->insert([
            'product_id' => 2,
            'genre_id' => 1,
            'stock' => 2,
        ]);
        DB::table('stocks')->insert([
            'product_id' => 2,
            'genre_id' => 2,
            'stock' => 7,
        ]);
    }
}
