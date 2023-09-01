<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyCustomerTagsTableAddForeigns extends Migration
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
            $table->foreign('company_customer_id')->references('id')->on('company_customer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign(['company_customer_id', 'tag_id']);
        });
    }
}
