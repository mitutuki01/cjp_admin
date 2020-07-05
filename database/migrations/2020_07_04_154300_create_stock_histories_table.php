<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_histories', function (Blueprint $table) {
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
        Schema::dropIfExists('stock_histories');
    }
}
