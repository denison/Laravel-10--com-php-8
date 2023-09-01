<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDefaultSpotenFeeFixedValueToHoldingsTable extends Migration
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
            $table->double('default_spoten_fee_fixed_pix_value')->default(0.50)->after('default_spoten_fee_fixed_value');
            $table->double('default_spoten_fee_fixed_credit_value')->default(0.50)->after('default_spoten_fee_fixed_value');
            $table->double('default_spoten_fee_fixed_debit_value')->default(0.50)->after('default_spoten_fee_fixed_value');
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
            $table->dropColumn('default_spoten_fee_fixed_pix_value');
            $table->dropColumn('default_spoten_fee_fixed_credit_value');
            $table->dropColumn('default_spoten_fee_fixed_debit_value');
        });
    }
}
