<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyCustomerTableSetNullableTrueUuid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_customer', function (Blueprint $table) 
        {
            $table->uuid('uuid')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_customer', function (Blueprint $table) 
        {
            $table->uuid('uuid')->nullable(false)->change();
        });
    }
}
