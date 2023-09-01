<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompaniesTableDropSafe2payIdToken extends Migration
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
                $table->dropColumn('safe2pay_id');
                $table->dropColumn('safe2pay_token');
                $table->dropColumn('spoten_fee');
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
                $table->string('safe2pay_id')->after('is_active')->nullable();
                $table->string('safe2pay_token')->after('is_active')->nullable();
                $table->integer('spoten_fee')->after('is_active')->default(1);
            }
        );
    }
}
