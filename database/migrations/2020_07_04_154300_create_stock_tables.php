<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_product', function (Blueprint $table) {
            $table->increments('product_id')->autoIncrement();
            $table->string('name');
            $table->string('image');
            $table->primary('product_id');
            $table->index('name');
        });

        Schema::table('mst_genre', function (Blueprint $table) {
            $table->increments('genre_id')->autoIncrement();
            $table->string('name');
            $table->primary('genre_id');
            $table->index('name');
        });

        Schema::table('stock', function (Blueprint $table) {
            $table->increments('product_id');
            $table->increments('genre_id');
            $table->integer('stock');
            $table->dateTime('create_dt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('update_dt')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->primary(['product_id', 'genre_id']);
        });

        Schema::table('stock_history', function (Blueprint $table) {
            $table->increments('product_id');
            $table->increments('genre_id');
            $table->integer('stock');
            $table->integer('modify_stock');
            $table->dateTime('create_dt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('update_dt')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->primary(['product_id', 'genre_id']);
            $table->index('create_dt');
            $table->index('update_dt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_product', function (Blueprint $table) {
            Schema::drop('mst_product');
        });
        Schema::table('mst_genre', function (Blueprint $table) {
            Schema::drop('mst_genre');
        });
        Schema::table('stock', function (Blueprint $table) {
            Schema::drop('stock');
        });
        Schema::table('stock_history', function (Blueprint $table) {
            Schema::drop('stock_history');
        });

    }
}
