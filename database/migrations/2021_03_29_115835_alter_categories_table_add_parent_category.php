<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriesTableAddParentCategory extends Migration
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
                $table->integer('parent_category_id')->unsigned()->nullable();   
                $table->foreign('parent_category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        // @todo
        // Syntax error or access violation: 1091 Can't DROP 'parent_category_id'; check that column/key exists (SQL: alter table `categories` drop foreign key `parent_category_id`) {"exception":"[
                   //object] (Illuminate\\Database\\QueryException(code: 42000): SQLSTATE[42000]: Syntax error or access violation: 1091 Can't DROP 'parent_category_id'; check that column/key exists (SQL: alter table `categories` drop foreign key `parent_cate
                   //gory_id`)
        try {
            Schema::table
            (
                'categories',
                function (Blueprint $table)
                {
                    $table->dropForeign(['parent_category_id']);
                    $table->dropColumn(['parent_category_id']);
                }
            );
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2021_03_29_115835_alter_categories_table_add_parent_category): '.$error->getMessage());
        }
    }
}
