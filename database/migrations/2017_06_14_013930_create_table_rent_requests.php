<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRentRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');
            $table->string('message');
            $table->integer('id_department')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_department')->references('id')->on('departments');
            $table->foreign('id_user')->references('id')->on('users');
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
