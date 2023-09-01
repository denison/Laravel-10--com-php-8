<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoucherIdToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->integer('used_voucher_id')->unsigned()->nullable()->after('id');
            $table->foreign('used_voucher_id')->references('id')->on('vouchers')->onDelete('restrict');
            $table->integer('credited_voucher_id')->unsigned()->nullable()->after('id');
            $table->foreign('credited_voucher_id')->references('id')->on('vouchers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropForeign(['used_voucher_id']);
                $table->dropColumn(['used_voucher_id']);
                $table->dropForeign(['credited_voucher_id']);
                $table->dropColumn(['credited_voucher_id']);
            });
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2021_02_03_172457_add_voucher_id_to_payments_table): '.$error->getMessage());
        }
    }
}
