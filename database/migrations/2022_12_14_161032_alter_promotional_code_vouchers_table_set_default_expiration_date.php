<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersTableSetDefaultExpirationDate extends Migration
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
            $table->dateTime('expiration_date')->default(null)->change();
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
            $table->dateTime('expiration_date')->default(\DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }
}
