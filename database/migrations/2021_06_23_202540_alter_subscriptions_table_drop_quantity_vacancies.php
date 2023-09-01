<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableDropQuantityVacancies extends Migration
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->dropColumn('quantity_vacancies');
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->integer('quantity_vacancies')->nullable(true)->default(null);
            }
        );
    }
}
