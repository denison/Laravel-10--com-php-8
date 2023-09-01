<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeCompanyAddExpirationDate extends Migration
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
            $table->dateTime('voucher_expiration_date')->default(\DB::raw('CURRENT_TIMESTAMP'))->after('voucher_description');
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
            $table->dropColumn('voucher_expiration_date');
        });
    }
}
