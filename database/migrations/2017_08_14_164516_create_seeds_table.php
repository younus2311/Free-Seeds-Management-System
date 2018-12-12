<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('storageId')->unsigned();
            $table->string('seed');
            $table->integer('quantity')->unsigned();
            $table->timestamps();

            $table->unique(array('storageId', 'seed'));
            $table->foreign('storageId')->references('id')->on('storages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seeds', function (Blueprint $table) {
            $table->dropForeign(['storageId']);
        });
        
        Schema::drop('seeds');
    }
}
