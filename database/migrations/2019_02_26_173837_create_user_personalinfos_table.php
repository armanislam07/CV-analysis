<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPersonalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personalinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->string('father_name', 80)->nullable();
            $table->string('mother_name', 80)->nullable();
            $table->string('dob', 50)->nullable();
            $table->string('gender', 8)->nullable();
            $table->string('religion', 15)->nullable();
            $table->string('marital_status', 15)->nullable();
            $table->string('nationality', 20)->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_email2')->nullable();
            $table->string('nid_no', 13)->nullable();
            $table->integer('mobile_number')->nullable();
            $table->integer('mobile_number2')->nullable();
            $table->string('parmanent_address', 150)->nullable();
            $table->string('paresent_address', 150)->nullable();
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
        Schema::dropIfExists('user_personalinfos');
    }
}
