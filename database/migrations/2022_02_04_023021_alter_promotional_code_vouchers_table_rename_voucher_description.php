<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersTableRenameVoucherDescription extends Migration
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
            $table->renameColumn('voucher_description', 'description');
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
            $table->renameColumn('description', 'voucher_description');
        });
    }
}
