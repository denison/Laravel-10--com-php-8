<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableSetForeignRechargeBalanceWithCardId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function ($table)
        {
            $table->dropForeign(['recharge_balance_with_card_id']);
            $table->foreign('recharge_balance_with_card_id')->references('id')->on('cards')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function ($table)
        {
            $table->dropForeign(['recharge_balance_with_card_id']);
            $table->foreign('recharge_balance_with_card_id')->references('id')->on('cards');
        });
    }
}
