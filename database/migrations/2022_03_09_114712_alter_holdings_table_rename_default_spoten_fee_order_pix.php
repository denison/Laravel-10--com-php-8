<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingsTableRenameDefaultSpotenFeeOrderPix extends Migration
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
            $table->renameColumn('default_spoten_fee_order_pix', 'default_spoten_fee_pix');
        });

        \DB::unprepared("update company_plan set spoten_fee_configurations = replace(spoten_fee_configurations, '\"order_pix\"', '\"pix\"')");
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
            $table->renameColumn('default_spoten_fee_pix', 'default_spoten_fee_order_pix');
        });

        \DB::unprepared("update company_plan set spoten_fee_configurations = replace(spoten_fee_configurations, '\"pix\"', '\"order_pix\"')");
    }
}
