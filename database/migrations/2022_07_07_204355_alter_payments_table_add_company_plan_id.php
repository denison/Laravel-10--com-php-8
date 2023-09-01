<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddCompanyPlanId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'payments', 
            function (Blueprint $table) 
            {
                $table->integer('company_plan_id')->unsigned()->nullable()->after('plan_id');
                $table->foreign('company_plan_id')->references('id')->on('company_plan')->onUpdate('cascade')->onDelete('set null');
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
        Schema::table(
            'payments', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['company_plan_id']);
                $table->dropColumn('company_plan_id');
            }
        );
    }
}
