<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillingConfigurationToCompanyPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_plan', function (Blueprint $table) {
            $table->json('spoten_fee_configurations')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_plan', function (Blueprint $table) {
            $table->dropColumn('spoten_fee_configurations');
        });
    }
}
