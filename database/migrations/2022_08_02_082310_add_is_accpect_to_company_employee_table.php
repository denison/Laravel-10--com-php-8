<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAccpectToCompanyEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('company_employee', 'is_accepted'))
        {
            Schema::table(
                'company_employee', 
                function (Blueprint $table) 
                {
                    $table->boolean('is_accepted')->nullable()->after('company_id');
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('company_employee', 'is_accepted'))
        {
            Schema::table(
                'company_employee', 
                function (Blueprint $table) 
                {
                    $table->dropColumn('is_accepted');
                }
            );
        }
    }
}
