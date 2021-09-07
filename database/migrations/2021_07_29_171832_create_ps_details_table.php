<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_details', function (Blueprint $table) {
            $table->id();
            $table->string('result');
            $table->decimal('level', $precision = 8, $scale = 2);
            $table->integer('points');
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('ps_test_athlete_id');
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('ps_test_athlete_id')->references('id')->on('ps_tests_athletes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_details');
    }
}
