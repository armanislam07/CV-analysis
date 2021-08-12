<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('com_id');
            $table->string('com_name');
            $table->string('com_logo')->nullable();
            $table->string('com_cont_Pname');
            $table->string('com_cont_Pmobile');
            $table->string('com_email');
            $table->string('com_number');
            $table->string('com_service');
            $table->longText('com_Haddress');
            $table->longText('com_sub_address')->nullable();
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
        Schema::dropIfExists('com_profiles');
    }
}
