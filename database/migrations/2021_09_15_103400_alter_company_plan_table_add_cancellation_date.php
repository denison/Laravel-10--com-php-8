<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableAddCancellationDate extends Migration
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
             function(Blueprint $table)
            {
                $table->dateTime('cancellation_date')->nullable()->after('recharge_date');
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
            function(Blueprint $table)
            {
                $table->dropColumn('cancellation_date');
            }
        );
    }
}
