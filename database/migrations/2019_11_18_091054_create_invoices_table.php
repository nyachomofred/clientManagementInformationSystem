<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no')->default('N/A');
            $table->string('client_no')->default('N/A');
            $table->string('member_id')->default('N/A');
            $table->string('firstname')->default('N/A');
            $table->string('lastname')->default('N/A');
            $table->string('email')->default('N/A');
            $table->string('phonenumber')->default('N/A');
            $table->string('invoice_name')->default('N/A');
             $table->string('vat')->default('N/A')->nullable();
           
            $table->string('day')->default('N/A');
            $table->string('month')->default('N/A');
            $table->string('year')->default('N/A');
            $table->string('dayTime')->default('N/A');
            $table->string('dueData')->default('N/A');
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
        Schema::dropIfExists('invoices');
    }
}
