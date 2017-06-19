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
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->integer('rooms_amount');
            $table->integer('bath_amount');
            $table->boolean('internet_service');
            $table->boolean('light_service');
            $table->boolean('water_service');
            $table->integer('rate')->default(0);
            $table->boolean('is_rented')->default(false);
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('payment_amount');

            $table->foreign('id_owner')->references('id')->on('users');
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
        //
    }
}
