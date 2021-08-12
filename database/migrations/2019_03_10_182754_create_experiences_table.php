<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('exp_com_name');
            $table->string('exp_com_business');
            $table->string('exp_com_designation');
            $table->string('exp_com_department');
            $table->string('exp_com_location');
            $table->string('exp_from_date');
            $table->string('exp_to_date')->nullable();
            $table->longtext('exp_com_responsibilities', 250);
            $table->longtext('exp_area')->nullable();
            $table->string('user_exp_keyword')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
