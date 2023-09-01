<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableSetCampaignId extends Migration
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
               $table->integer('campaign_id')->unsigned()->nullable(true)->change();
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
                $table->integer('campaign_id')->unsigned()->nullable(false)->change();
           }
       );
   }
}
