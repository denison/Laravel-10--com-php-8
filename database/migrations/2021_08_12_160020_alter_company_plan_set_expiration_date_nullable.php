<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanSetExpirationDateNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table
        (
            'company_plan', 
            function (Blueprint $table) 
            {
                $table->dateTime('expiration_date')->nullable(true)->change();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table
        (
            'company_plan', 
            function (Blueprint $table) 
            {
                $table->dateTime('expiration_date')->nullable(false)->change();
            }
        );
    }
}
