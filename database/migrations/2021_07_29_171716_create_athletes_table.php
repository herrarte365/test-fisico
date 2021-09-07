<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->integer('age');
            $table->date('date_of_birth');
            $table->string('stablishment')->nullable();
            $table->string('status');
            $table->integer('current_level');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('physical_workout_id')->nullable();
            $table->string('observations')->nullable();
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('athletes');
    }
}
