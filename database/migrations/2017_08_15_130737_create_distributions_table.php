<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('farmerId')->unsigned();
            $table->integer('seedId')->unsigned();
            $table->integer('requiredQuantity')->unsigned();
            $table->timestamps();

            $table->foreign('farmerId')->references('id')->on('farmers');
            $table->foreign('seedId')->references('id')->on('seeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distributions', function (Blueprint $table) {
            $table->dropForeign(['farmerId']);
            $table->dropForeign(['seedId']);
        });

        Schema::drop('distributions');
    }
}
