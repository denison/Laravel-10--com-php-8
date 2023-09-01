<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanSetDefaultPaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_plan', function (Blueprint $table) 
        {
            $table->string('payment_method')->default('credit')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_plan', function (Blueprint $table) 
        {
            $table->string('payment_method')->default(null)->change();
        });
    }
}
