<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeCompanySetNullableVoucherDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotional_code_company', function (Blueprint $table) 
        {
            $table->string('voucher_description')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotional_code_company', function (Blueprint $table) 
        {
            $table->string('voucher_description')->nullable(false)->change();
        });
    }
}
