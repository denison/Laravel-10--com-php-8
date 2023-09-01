<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriesTableRenameParentCategoryId extends Migration
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
            'categories', 
            function (Blueprint $table) 
            {
                $table->renameColumn('parent_category_id', 'parent_company_category_id');
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
            'categories', 
            function (Blueprint $table) 
            {
                $table->renameColumn('parent_company_category_id', 'parent_category_id');
            }
        );
    }
}
