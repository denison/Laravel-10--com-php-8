<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableAddCompanyId extends Migration
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
                $table->integer('company_id')->unsigned()->nullable()->after('has_push');
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
        Schema::table('campaigns_log', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
   }
}
