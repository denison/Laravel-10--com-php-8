<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddInstallment extends Migration
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
            'payments', 
            function (Blueprint $table) 
            {
                $table->integer('installments_quantity')->nullable()->after('method');
                $table->boolean('customer_pay_installment_fees')->nullable()->after('method');
                $table->double('installment_fee')->nullable()->after('method');
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
            'payments', 
            function (Blueprint $table) 
            {
                $table->dropColumn('installments_quantity');
                $table->dropColumn('customer_pay_installment_fees');
                $table->dropColumn('installment_fee');                
            }
        );
    }
}
