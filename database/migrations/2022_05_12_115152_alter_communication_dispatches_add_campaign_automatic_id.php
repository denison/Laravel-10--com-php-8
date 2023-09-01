<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCommunicationDispatchesAddCampaignAutomaticId extends Migration
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
                $table->integer('campaign_automatic_id')->unsigned()->nullable()->after('campaign_automatic_type');
                $table->foreign('campaign_automatic_id')->references('id')->on('campaigns_automatic')->onDelete('set null')->onUpdate('cascade');
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
        //
    }
}
