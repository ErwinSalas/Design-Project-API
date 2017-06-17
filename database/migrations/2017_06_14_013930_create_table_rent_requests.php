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
            $table->string('status');
            $table->date('request_date');
            $table->integer('id_department')->unsigned();
            $table->integer('id_applicant')->unsigned();

            $table->foreign('id_department')->references('id')->on('departments');
            $table->foreign('id_applicant')->references('id')->on('users');
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
