<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableSetPlanId extends Migration
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
                $table->dropForeign('company_plan_plan_id_foreign');
                $table->foreign('plan_id')->references('id')->on('plans')->onDelete('restrict');
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
                $table->dropForeign('company_plan_plan_id_foreign');
                $table->foreign('plan_id')->references('id')->on('plans')->onDelete('restrict');
            }
        );
    }
}
