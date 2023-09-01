<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeCompanyTableRenameValidityDays extends Migration
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
            $table->renameColumn('validity_days', 'voucher_validity_days');
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
            $table->renameColumn('voucher_validity_days', 'validity_days');
        });
    }
}
