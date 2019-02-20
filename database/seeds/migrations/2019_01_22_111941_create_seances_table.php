<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->integer('hall_id')->unsigned();
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
            $table->integer('film_id')->unsigned();
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('seances');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
