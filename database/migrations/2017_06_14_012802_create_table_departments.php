<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_owner')->unsigned();
            $table->integer('id_renter')->unsigned();
            $table->string('direction');
            $table->integer('rooms_num');
            $table->integer('bath-num');
            $table->boolean('internet_service');
            $table->boolean('light_service');
            $table->boolean('water_service');
            $table->integer('rate');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('amount');
            $table->foreign('id_owner')->references('id')->on('users');
            $table->foreign('id_renter')->references('id')->on('users');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
