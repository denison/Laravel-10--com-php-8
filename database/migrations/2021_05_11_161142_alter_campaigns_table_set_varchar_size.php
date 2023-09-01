<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableSetVarcharSize extends Migration
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
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->string('description', 512)->change();
                $table->string('email_body', 512)->change();
                $table->string('push_body', 512)->change();
                $table->string('whatsapp_body', 512)->change();
                $table->string('sms_body', 512)->change();
                $table->string('voucher_description', 512)->change();    
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
            'campaigns', 
            function (Blueprint $table)
            {
                $table->string('description')->change();
                $table->string('email_body')->change();
                $table->string('push_body')->change();
                $table->string('whatsapp_body')->change();
                $table->string('sms_body')->change();
                $table->string('voucher_description')->change();    
            }
        );
    }
}
