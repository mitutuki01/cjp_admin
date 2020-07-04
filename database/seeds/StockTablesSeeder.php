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
        // Fakerを使う
        $faker = Faker\Factory::create('ja_JP');

        DB::table('mst_product')->insert([
            'product_id' => 1,
            'name' => 'モデラート',
            'image' => '',
        ]);
        DB::table('mst_product')->insert([
            'product_id' => 2,
            'name' => '酒器だるま',
            'image' => '',
        ]);

        DB::table('mst_genre')->insert([
            'genre_id' => 1,
            'name' => 'EC',
        ]);
        DB::table('mst_genre')->insert([
            'genre_id' => 2,
            'name' => 'カタログ',
        ]);

        DB::table('stock')->insert([
            'product_id' => 1,
            'genre_id' => 1,
            'stock' => 10,
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
        DB::table('stock')->insert([
            'product_id' => 1,
            'genre_id' => 2,
            'stock' => 5,
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
        DB::table('stock')->insert([
            'product_id' => 2,
            'genre_id' => 1,
            'stock' => 2,
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
        DB::table('stock')->insert([
            'product_id' => 1,
            'genre_id' => 2,
            'stock' => 7,
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
    }
}
