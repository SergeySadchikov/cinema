<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qr_code');
            $table->integer('seat_id')->unsigned();
            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade');
            $table->integer('seance_id')->unsigned();
            $table->foreign('seance_id')->references('id')->on('seances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('tickets');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
