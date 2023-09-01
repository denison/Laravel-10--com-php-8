<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableSetLatitudeLongitudeDefault extends Migration
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
                $table->decimal('latitude', 10, 8)->nullable()->default(0)->change();
                $table->decimal('longitude', 10, 8)->nullable()->default(0)->change();
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
            'companies', 
            function (Blueprint $table) 
            {
                $table->decimal('latitude', 10, 8)->nullable()->default(null)->change();
                $table->decimal('longitude', 10, 8)->nullable()->default(null)->change();
            }
        );
    }
}
