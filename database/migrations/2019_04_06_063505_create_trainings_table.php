<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('traning_title', 200)->nullable();
            $table->string('topic', 200)->nullable();
            $table->string('institute', 250)->nullable();
            $table->string('country', 250)->nullable();
            $table->string('location', 250)->nullable();
            $table->string('pass_year', 250)->nullable();
            $table->string('duration', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
