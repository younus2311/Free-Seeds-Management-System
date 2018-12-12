<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersOfDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers_of_distributors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distributorId')->unsigned();
            $table->integer('dealerId')->unsigned();
            $table->timestamps();

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
        Schema::table('dealers_of_distributors', function (Blueprint $table) {
            $table->dropForeign(['distributorId']);
            $table->dropForeign(['dealerId']);
        });
        
        Schema::drop('dealers_of_distributors');
    }
}
