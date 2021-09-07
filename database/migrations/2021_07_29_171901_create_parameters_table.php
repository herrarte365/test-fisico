<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->string('min');
            $table->string('max');
            $table->integer('age');
            $table->string('gender');
            $table->unsignedBigInteger('test_id');
            $table->integer('points');
            $table->unsignedBigInteger('physical_workout_id')->nullable();
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('physical_workout_id')->references('id')->on('physical_workouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
