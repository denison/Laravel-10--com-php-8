<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyPlanTableRenameAdicionalValue extends Migration
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
            'company_plan', 
            function (Blueprint $table) 
            {
                $table->renameColumn('adicional_value', 'additional_value');
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
            'company_plan', 
            function (Blueprint $table) 
            {
                $table->renameColumn('additional_value', 'adicional_value');
            }
        );
    }
}
