<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfigRechargeInTableCompanies extends Migration
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
            $table->boolean('automatic_recharge_balance')->default(false)->after('balance');
            $table->float('recharge_balance_when')->default(5)->after('automatic_recharge_balance');
            $table->float('recharge_balance_value')->default(10)->after('recharge_balance_when');
            $table->integer('recharge_balance_with_card_id')->unsigned()->nullable()->after('recharge_balance_value');
            $table->foreign('recharge_balance_with_card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table)
        {
            $table->dropColumn('automatic_recharge_balance');
            $table->dropColumn('recharge_balance_when');
            $table->dropColumn('recharge_balance_value');
            $table->dropForeign(['recharge_balance_with_card_id']);
            $table->dropColumn('recharge_balance_with_card_id');
        });
    }
}
