<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCategoryCompanyTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('category_company');
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::create
        (
            'category_company', 
            function (Blueprint $table) 
            {
                $table->increments('id');
                $table->integer('category_id')->unsigned();
                $table->integer('company_id')->unsigned();

                $table->timestamps();
                
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');               
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            }
        );
    }
}
