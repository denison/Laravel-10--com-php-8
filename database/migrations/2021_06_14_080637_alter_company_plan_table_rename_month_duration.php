<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableRenameMonthDuration extends Migration
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
                $table->renameColumn('month_duration', 'months_duration');
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
                $table->renameColumn('months_duration', 'month_duration');
            }
        );
    }
}
