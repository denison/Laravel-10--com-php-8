<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCommunicationDispatchesRenameAutoCampaignType extends Migration
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
            'communication_dispatches', 
            function (Blueprint $table) 
            {
                $table->renameColumn('auto_campaign_type', 'campaign_automatic_type');
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
            'communication_dispatches', 
            function (Blueprint $table) 
            {
                $table->renameColumn('campaign_automatic_type', 'auto_campaign_type');
            }
        );
    }
}
