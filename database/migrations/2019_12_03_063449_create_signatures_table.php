<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clouser')->default('N/A')->nullable();
            $table->string('companyName')->default('N/A')->nullable();
            $table->string('companyTelNo')->default('N/A')->nullable();
            $table->string('companyEmail')->default('N/A')->nullable();
            $table->string('companyWebsiteLink')->default('N/A')->nullable();
            $table->string('signatureLogo')->default('N/A')->nullable();
            $table->string('companyLogo')->default('N/A')->nullable();
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
        Schema::dropIfExists('signatures');
    }
}
