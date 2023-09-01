<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableAddMinimumValueOfOrder extends Migration
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
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->decimal('voucher_payment_minimum_value')->nullable()->after('voucher_value');
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
            'campaigns', 
            function (Blueprint $table)
            {
                $table->dropColumn('voucher_payment_minimum_value');
            }
        );
    }
}
