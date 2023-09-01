<?php
/**
* @TODO ajeitar contas bancárias
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddBankData extends Migration
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
            'companies',
            function (Blueprint $table)
            {
                $table->string('bank_code')->nullable();
                $table->string('bank_agency')->nullable();
                $table->string('bank_agency_digit')->nullable();
                $table->string('bank_account')->nullable();
                $table->string('bank_account_digit')->nullable();
                $table->string('bank_account_type')->nullable();
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
        Schema::table
        (
            'companies',
            function (Blueprint $table)
            {
                $table->dropColumn('bank_code');
                $table->dropColumn('bank_agency');
                $table->dropColumn('bank_agency_digit');
                $table->dropColumn('bank_account');
                $table->dropColumn('bank_account_digit');
                $table->dropColumn('bank_account_type');
            }
        );
    }
}
