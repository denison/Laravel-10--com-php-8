<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersTableAddPaymentMinimumValue extends Migration
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
            'promotional_code_vouchers', 
            function (Blueprint $table) 
            {
                $table->decimal('payment_minimum_value')->nullable()->after('voucher_value');
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
            'promotional_code_vouchers', 
            function (Blueprint $table)
            {
                $table->dropColumn('payment_minimum_value');
            }
        );
    }
}
