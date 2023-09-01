<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableDropForeignCampaignId extends Migration
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
            'vouchers', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['campaign_id']);
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
            'vouchers',
            function (Blueprint $table)
            {
                $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('restrict');
            }
        );
    }
}
