<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->decimal('general_score', $precision = 8, $scale = 2);
            $table->integer('general_level');
            $table->unsignedBigInteger('ps_test_athlete_id')->unique();
            $table->timestamps();

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
        Schema::dropIfExists('test_results');
    }
}
