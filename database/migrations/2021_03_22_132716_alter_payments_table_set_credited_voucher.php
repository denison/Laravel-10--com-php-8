<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableSetCreditedVoucher extends Migration
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
                $table->dropForeign(['credited_voucher_id']);
                //$table->foreign('credited_voucher_id')->references('id')->on('vouchers')->onDelete('set null');
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
        // @todo
        // Syntax error or access violation: 1091 Can't DROP 'payments_credited_voucher_id_foreign'; check that column/key exists (SQL: alter table `payments` drop foreign key `payments_credited_voucher_id_foreign`
        try {
            Schema::table
            (
                'payments',
                function (Blueprint $table)
                {
                    $table->foreign('credited_voucher_id')->references('id')->on('vouchers')->onDelete('restrict');
                }
            );
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2021_03_22_132716_alter_payments_table_set_credited_voucher): '.$error->getMessage());
        }
    }
}
