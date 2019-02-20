<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('halls', function (Blueprint $table) {
            $table->integer('seats')->default(8)->change();
            $table->integer('rows')->default(10)->change();
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
        Schema::table('halls', function (Blueprint $table) {
            $table->integer('seats')->change();
            $table->integer('rows')->change();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
