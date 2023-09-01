<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCommunicationDispatchesTableAddCampaignDispatchId extends Migration
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
                $table->integer('campaign_dispatch_id')->unsigned()->nullable();
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
                $table->dropColumn('campaign_dispatch_id');
            }
        );
    }
}
