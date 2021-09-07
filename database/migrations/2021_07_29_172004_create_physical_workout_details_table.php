<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalWorkoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_workout_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('physical_workout_id');
            $table->unsignedBigInteger('detail_id');
            $table->timestamps();

            $table->foreign('physical_workout_id')->references('id')->on('physical_workouts');
            $table->foreign('detail_id')->references('id')->on('exercise_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physical_workout_details');
    }
}
