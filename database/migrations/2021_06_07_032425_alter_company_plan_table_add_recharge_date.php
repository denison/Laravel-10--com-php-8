<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableAddRechargeDate extends Migration
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
                $table->dateTime('recharge_date');
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
                $table->dropColumn('recharge_date');
            }
        );
    }
}
