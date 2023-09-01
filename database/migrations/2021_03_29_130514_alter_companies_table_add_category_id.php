<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableAddCategoryId extends Migration
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
                $table->integer('category_id')->unsigned()->nullable();   
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
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
        /**
        * @todo [2022-01-07 18:28:03] local.ERROR: SQLSTATE[42000]: Syntax error or access violation: 1091 Can't DROP 'category_id'; check that column/key exists (SQL: alter table `companies` drop foreign key `category_id`) {"exception":"[object] (Illumi
                nate\\Database\\QueryException(code: 42000): SQLSTATE[42000]: Syntax error or access violation: 1091 Can't DROP 'category_id'; check that column/key exists (SQL: alter table `companies` drop foreign key `category_id`) at /var/www/html/ven
                dor/laravel/framework/src/Illuminate/Database/Connection.php:671)
         */
        try {
            Schema::table
            (
                'companies',
                function (Blueprint $table)
                {
                    $table->dropForeign(['category_id']);
                    $table->dropColumn(['category_id']);
                }
            );
        } catch (\Exception $error) {
            \Log::notice('Erro na migration (2021_03_29_130514_alter_companies_table_add_category_id): '.$error->getMessage());
        }
    }
}
