<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyCustomerTagsTableRenameUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_customer_tags', function (Blueprint $table) 
        {
            $table->renameColumn('user_id', 'company_customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_customer_tags', function (Blueprint $table) 
        {
            $table->renameColumn('company_customer_id', 'user_id');
        });
    }
}
