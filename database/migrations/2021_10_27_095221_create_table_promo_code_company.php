<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePromoCodeCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_code_company', function (Blueprint $table) 
        {
            $table->increments('id');

            $table->integer('promotional_code_id')->unsigned();
            $table->foreign('promotional_code_id')->references('id')->on('promotional_codes')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

            $table->decimal('voucher_value', 10, 2);
            $table->integer('validity_days')->unsigned();
            
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
        Schema::dropIfExists('promotional_code_company');
    }
}


