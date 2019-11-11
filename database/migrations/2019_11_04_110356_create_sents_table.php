<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_id')->default('N/A');
            $table->string('firstname')->default('N/A');
            $table->string('lastname')->default('N/A');
            $table->string('message_id')->default('N/A');
            $table->string('name')->default('N/A');
            $table->string('subject')->default('N/A');
            $table->text('message');
            $table->string('file')->default('N/A');
            $table->string('cc')->default('N/A');
            $table->string('dayTime')->default('N/A');
            $table->string('day')->default('N/A');
            $table->string('month')->default('N/A');
            $table->string('year')->default('N/A');
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
        Schema::dropIfExists('sents');
    }
}
