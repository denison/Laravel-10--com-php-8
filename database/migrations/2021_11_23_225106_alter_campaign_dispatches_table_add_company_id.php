<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignDispatchesTableAddCompanyId extends Migration
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
            'campaign_dispatches',
            function (Blueprint $table)
            {
                $table->integer('company_id')->unsigned()->after('id');
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
            'campaign_dispatches',
            function (Blueprint $table)
            {
                $table->dropColumn('company_id');
            }
        );
    }
}
