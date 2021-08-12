<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('exam_title', 100);
            $table->string('education_type', 100);
            $table->string('subject', 100);
            $table->string('institute', 100);
            $table->string('board', 100);
            $table->string('result', 4);
            $table->string('result_scale', 10)->nullable();
            $table->year('pass_year');
            $table->string('duration', 40);
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
        Schema::dropIfExists('education');
    }
}
