<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinglemailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singlemails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_no')->default('N/A');
            $table->string('member_id')->default('N/A');
            $table->string('firstname')->default('N/A');
            $table->string('middlename')->default('N/A');
            $table->string('lastname')->default('N/A');
            $table->string('phonenumber')->default('N/A');
            $table->string('email')->default('N/A');
            $table->string('location')->default('N/A');
            $table->string('place_of_work')->default('N/A');
            $table->string('role')->default('N/A');
            $table->string('member_type')->default('N/A');
            $table->string('subject')->default('N/A');
            $table->text('message');
            $table->string('day')->default('N/A');
            $table->string('month')->default('N/A');
            $table->string('year')->default('N/A');
            $table->string('dayTime')->default('N/A');
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
        Schema::dropIfExists('singlemails');
    }
}
