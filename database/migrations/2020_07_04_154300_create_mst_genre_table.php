<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_genre', function (Blueprint $table) {
            $table->increments('genre_id')->autoIncrement();
            $table->string('name');
            $table->primary('genre_id');
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
        Schema::table('mst_genre', function (Blueprint $table) {
            Schema::drop('mst_genre');
        });
    }
}
