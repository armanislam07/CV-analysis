<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCircularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_circulars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('com_id');
            $table->string('job_title', 80);
            $table->string('vacancy', 5);
            $table->longtext('job_context', 250)->nullable();
            // $table->longtext('job_responsibilities', 250);
            // $table->longtext('additional_requirements', 250);
            // $table->longtext('other_benefits', 100);
            $table->string('employment_status', 20)->nullable();
            $table->string('education_type', 80)->nullable();
            $table->string('education_requirements', 100);
            $table->string('experience', 3)->default('N/A');
            $table->string('job_exp_keyword');
            $table->string('salary', 10);
            $table->string('accepted_parcent', 3)->nullable();
            $table->string('job_area', 100);
            $table->string('job_deadline');
            $table->string('job_catagories', 100);
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
        Schema::dropIfExists('job_circulars');
    }
}
