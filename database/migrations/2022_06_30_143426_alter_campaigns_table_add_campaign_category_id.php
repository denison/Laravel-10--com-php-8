<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableAddCampaignCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->integer('campaign_category_id')->unsigned()->nullable();
                $table->foreign('campaign_category_id')->references('id')->on('campaign_categories')->onUpdate('cascade')->onDelete('set null');
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
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['campaign_category_id']);
                $table->dropColumn('campaign_category_id');
            }
        );
    }
}
