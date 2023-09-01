<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddTransactionFees extends Migration
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
            'companies', 
            function (Blueprint $table) 
            {
                $table->double('spoten_fee_order_pix')->default(1.1)->after('spoten_fee');
                $table->double('spoten_fee_order_debit')->default(2.5)->after('spoten_fee');
                $table->double('spoten_fee_order_credit')->default(2.9)->after('spoten_fee');
                $table->double('spoten_fee_subscription')->default(10)->after('spoten_fee');
                $table->double('spoten_fee_giftcard')->default(10)->after('spoten_fee');
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
            'companies', 
            function (Blueprint $table) 
            {
                $table->dropColumn('spoten_fee_order_pix');
                $table->dropColumn('spoten_fee_order_debit');
                $table->dropColumn('spoten_fee_order_credit');
                $table->dropColumn('spoten_fee_subscription');
                $table->dropColumn('spoten_fee_giftcard');
            }
        );
    }
}
