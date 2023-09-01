<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddInstallment extends Migration
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
                $table->integer('minimum_value_installment')->default(5);
                $table->boolean('customer_pay_installment_fees')->default(true);
                $table->integer('accepted_installment_quantity')->default(1);
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
                $table->dropColumn('minimum_value_installment');
                $table->dropColumn('customer_pay_installment_fees');
                $table->dropColumn('accepted_installment_quantity');
            }
        );
    }
}
