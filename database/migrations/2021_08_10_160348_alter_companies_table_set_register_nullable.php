<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableSetRegisterNullable extends Migration
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
                $table->string('email')->nullable(true)->change();
                $table->longText('description')->nullable(true)->change();
                $table->string('zipcode')->nullable(true)->change();
                $table->string('address')->nullable(true)->change();
                $table->string('number')->nullable(true)->change();
                $table->string('neighborhood')->nullable(true)->change();
                $table->string('city')->nullable(true)->change();
                $table->string('state')->nullable(true)->change();
                $table->decimal('latitude', 11, 8)->nullable(true)->default(null)->change();
                $table->decimal('longitude', 11, 8)->nullable(true)->default(null)->change();
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
                $table->string('email')->nullable(false)->change();
                $table->longText('description')->nullable(false)->change();
                $table->string('zipcode')->nullable(false)->change();
                $table->string('address')->nullable(false)->change();
                $table->string('number')->nullable(false)->change();
                $table->string('neighborhood')->nullable(false)->change();
                $table->string('city')->nullable(false)->change();
                $table->string('state')->nullable(false)->change();
                $table->decimal('latitude', 11, 8)->nullable(false)->default(null)->change();
                $table->decimal('longitude', 11, 8)->nullable(false)->default(null)->change();
            }
        );
    }
}
