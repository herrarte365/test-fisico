<?php

use App\Models\Physical_test;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsTestsAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_tests_athletes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('physical_test_id');
            $table->unsignedBigInteger('athlete_id');
            $table->timestamps();

            $table->foreign('physical_test_id')->references('id')->on('physical_tests');
            $table->foreign('athlete_id')->references('id')->on('athletes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_tests_athletes');
    }
}
