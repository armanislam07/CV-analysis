<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCareerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_career_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('objective', 255)->nullable();
            $table->string('present_salary', 7)->nullable();
            $table->string('expected_salary', 7)->nullable();
            $table->string('job_lavel', 12)->nullable();
            $table->string('career_summary', 255)->nullable();
            $table->string('special_quality', 255)->nullable();
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
        Schema::dropIfExists('user_career_infos');
    }
}
