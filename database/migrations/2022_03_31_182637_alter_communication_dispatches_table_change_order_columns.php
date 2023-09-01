<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCommunicationDispatchesTableChangeOrderColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communication_dispatches', function (Blueprint $table) 
        {
            $table->integer('company_id')->unsigned()->nullable(false)->change();
            
            \DB::unprepared('
                ALTER TABLE 
                    `communication_dispatches` 
                CHANGE COLUMN 
                    `campaign_dispatch_id` `campaign_dispatch_id` INT(10) UNSIGNED NULL DEFAULT NULL AFTER `campaign_id`,
                CHANGE COLUMN 
                    `auto_campaign_type` `auto_campaign_type` VARCHAR(255) NULL DEFAULT NULL AFTER `campaign_dispatch_id`
            ');            
        });
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
