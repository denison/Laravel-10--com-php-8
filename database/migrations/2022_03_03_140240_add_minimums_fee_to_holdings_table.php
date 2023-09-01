<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinimumsFeeToHoldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->double('minimum_spoten_fee_pix')->nullable();
            $table->double('minimum_spoten_fee_credit')->nullable();
            $table->double('minimum_spoten_fee_debit')->nullable();
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
            $table->dropColumn('minimum_spoten_fee_pix');
            $table->dropColumn('minimum_spoten_fee_credit');
            $table->dropColumn('minimum_spoten_fee_debit');
        });
    }
}
