<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingsTableRenameDefaultSpotenFeeOrderDebit extends Migration
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
            $table->renameColumn('default_spoten_fee_order_debit', 'default_spoten_fee_debit');
        });

        \DB::unprepared("update company_plan set spoten_fee_configurations = replace(spoten_fee_configurations, '\"order_debit\"', '\"debit\"')");
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
            $table->renameColumn('default_spoten_fee_debit', 'default_spoten_fee_order_debit');
        });

        \DB::unprepared("update company_plan set spoten_fee_configurations = replace(spoten_fee_configurations, '\"debit\"', '\"order_debit\"')");
    }
}
