<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_id')->default('N/A');
            $table->string('firstname')->default('N/A');
            $table->string('lastname')->default('N/A');
            $table->string('phonenumber')->default('N/A');
            $table->string('email')->default('N/A');
            $table->string('location')->default('N/A');
            $table->string('place_of_work')->default('N/A');
            $table->string('role')->default('N/A');
            $table->string('member_type')->default('N/A');
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
        Schema::dropIfExists('clients');
    }
}
