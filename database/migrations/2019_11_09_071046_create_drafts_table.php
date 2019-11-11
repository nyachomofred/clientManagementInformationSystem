<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->bigIncrements('id');
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
        Schema::dropIfExists('drafts');
    }
}
