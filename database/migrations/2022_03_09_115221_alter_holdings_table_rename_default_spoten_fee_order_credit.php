<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingsTableRenameDefaultSpotenFeeOrderCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holdings', function (Blueprint $table) 
        {
            $table->renameColumn('default_spoten_fee_order_credit', 'default_spoten_fee_credit');
        });

        \DB::unprepared("update company_plan set spoten_fee_configurations = replace(spoten_fee_configurations, '\"order_credit\"', '\"credit\"')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holdings', function (Blueprint $table) 
        {
            $table->renameColumn('default_spoten_fee_credit', 'default_spoten_fee_order_credit');
        });

        \DB::unprepared("update company_plan set spoten_fee_configurations = replace(spoten_fee_configurations, '\"credit\"', '\"order_credit\"')");
    }
}
