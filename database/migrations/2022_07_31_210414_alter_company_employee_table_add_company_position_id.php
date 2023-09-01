<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyEmployeeTableAddCompanyPositionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'company_employee', 
            function (Blueprint $table) 
            {
                $table->integer('company_position_id')->unsigned()->nullable()->after('company_id');
                $table->foreign('company_position_id')->references('id')->on('company_positions')->onUpdate('cascade')->onDelete('set null');
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
        Schema::table(
            'company_employee', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['company_position_id']);
                $table->dropColumn('company_position_id');
            }
        );
    }
}
