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
    }
}
