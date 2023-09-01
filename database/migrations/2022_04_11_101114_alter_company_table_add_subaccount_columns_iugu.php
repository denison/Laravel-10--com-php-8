<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyTableAddSubaccountColumnsIugu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) 
        {
            $table->string('iugu_sub_account_token')->nullable();
            $table->string('iugu_sub_account_api_token_live')->nullable();
            $table->string('iugu_sub_account_api_token_test')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) 
        {
            $table->dropColumn('iugu_sub_account_token');
            $table->dropColumn('iugu_sub_account_api_token_live');
            $table->dropColumn('iugu_sub_account_api_token_test');
        });
    }
}