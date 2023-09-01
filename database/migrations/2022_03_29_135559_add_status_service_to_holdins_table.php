<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusServiceToHoldinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holdings', function (Blueprint $table) 
        {
            $table->boolean('status_service_aws_sms')->default(true);
            $table->boolean('status_service_sendgrid_email')->default(true);
            $table->boolean('status_service_twilio_sms')->default(true);
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holdings', function (Blueprint $table) 
        {
            $table->dropColumn('status_service_aws_sms');
            $table->dropColumn('status_service_sendgrid_email');
            $table->dropColumn('status_service_twilio_sms');
        });
    }
}
