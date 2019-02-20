<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('row');
            $table->string('type', 30);
            $table->decimal('price', 10, 2);
            $table->integer('hall_id')->unsigned();
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
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
        Schema::dropIfExists('seats');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
