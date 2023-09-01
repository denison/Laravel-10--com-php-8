<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeCompanyDropValidityDays extends Migration
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
            $table->dropColumn('voucher_validity_days');
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
            $table->integer('voucher_validity_days')->unsigned()->after('voucher_description');
        });
    }
}
