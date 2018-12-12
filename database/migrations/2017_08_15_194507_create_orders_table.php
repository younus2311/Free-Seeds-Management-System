<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distributionId')->unsigned();
            $table->integer('distributorId')->unsigned();
            $table->integer('dealerId')->unsigned();
            $table->tinyInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('distributionId')->references('id')->on('distributions');
            $table->foreign('distributorId')->references('id')->on('users');
            $table->foreign('dealerId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->dropForeign(['distributionId']);
            $table->dropForeign(['distributorId']);
            $table->dropForeign(['dealerId']);
        });

        Schema::drop('orders');
    }
}
