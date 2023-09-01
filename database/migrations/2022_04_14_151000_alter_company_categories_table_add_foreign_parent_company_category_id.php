<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyCategoriesTableAddForeignParentCompanyCategoryId extends Migration
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
            'company_categories', 
            function (Blueprint $table) 
            {
                $table->foreign('parent_company_category_id')->references('id')->on('company_categories')->onDelete('cascade')->onUpdate('cascade');
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
            'company_categories', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['parent_company_category_id']);
            }
        );
    }
}
