<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingsTableAddDefaultCompanyPlanId extends Migration
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
            'holdings', 
            function (Blueprint $table) 
            {
                $table->integer('default_company_plan_id')->unsigned()->nullable();
                $table->foreign('default_company_plan_id')->references('id')->on('plans')->onDelete('restrict');
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
            'holdings', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['default_company_plan_id']);
                $table->dropColumn('default_company_plan_id');
            }
        );
    }
}
