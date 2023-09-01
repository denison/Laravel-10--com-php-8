<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersTableRenameVoucherValue extends Migration
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
            $table->renameColumn('voucher_value', 'value');
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
            $table->renameColumn('value', 'voucher_value');
        });
    }
}
