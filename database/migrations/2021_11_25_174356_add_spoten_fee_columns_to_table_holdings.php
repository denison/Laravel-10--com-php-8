<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpotenFeeColumnsToTableHoldings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->double('default_spoten_fee_order_pix')->default(1.1);
            $table->double('default_spoten_fee_order_debit')->default(2.5);
            $table->double('default_spoten_fee_order_credit')->default(2.9);
            $table->double('default_spoten_fee_subscription')->default(10);
            $table->double('default_spoten_fee_giftcard')->default(10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->dropColumn('default_spoten_fee_order_pix');
            $table->dropColumn('default_spoten_fee_order_debit');
            $table->dropColumn('default_spoten_fee_order_credit');
            $table->dropColumn('default_spoten_fee_subscription');
            $table->dropColumn('default_spoten_fee_giftcard');
        });
    }
}