<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingsTableAddGatewayFees extends Migration
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
            $table->float('gateway_fee_pix')->default(0.89);
            $table->float('gateway_fee_debit')->default(2.39);
            $table->json('gateway_fee_credit')->nullable();
            $table->float('gateway_fee_fixed_credit_value')->default(0.30);
            $table->float('gateway_fee_anticipation_of_receivables')->default(1.99);
        });
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
            $table->dropColumn('gateway_fee_pix');
            $table->dropColumn('gateway_fee_debit');
            $table->dropColumn('gateway_fee_credit');
            $table->dropColumn('gateway_fee_fixed_credit_value');
            $table->dropColumn('gateway_fee_anticipation_of_receivables');
        });
    }
}
