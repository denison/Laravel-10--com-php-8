<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriesTableDropForeignParentCategoryId extends Migration
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
                $table->dropForeign(['parent_category_id']);
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
                $table->foreign('parent_category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            }
        );
    }
}
