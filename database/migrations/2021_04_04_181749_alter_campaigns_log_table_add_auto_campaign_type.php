<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableAddAutoCampaignType extends Migration
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
            'campaigns_log',
            function (Blueprint $table)
            {
                $table->string('auto_campaign_type')->nullable();
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
            'campaigns_log',
            function (Blueprint $table)
            {
                $table->dropColumn('auto_campaign_type');
            }
        );
    }
}
