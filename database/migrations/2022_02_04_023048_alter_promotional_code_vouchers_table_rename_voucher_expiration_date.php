<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersTableRenameVoucherExpirationDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotional_code_vouchers', function (Blueprint $table) 
        {
            $table->renameColumn('voucher_expiration_date', 'expiration_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotional_code_vouchers', function (Blueprint $table) 
        {
            $table->renameColumn('expiration_date', 'voucher_expiration_date');
        });
    }
}
