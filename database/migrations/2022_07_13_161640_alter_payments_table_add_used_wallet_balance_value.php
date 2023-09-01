<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddUsedWalletBalanceValue extends Migration
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
                $table->decimal('used_wallet_balance_value')->after('value')->nullable();
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
                $table->dropColumn('used_wallet_balance_value');
            }
        );
    }
}
