<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProqualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proqualities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('certificat', 200)->nullable();
            $table->string('institute', 200)->nullable();
            $table->string('location', 200)->nullable();
            $table->string('pass_year', 50)->nullable();
            $table->string('duration', 50)->nullable();
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
        Schema::dropIfExists('proqualities');
    }
}
