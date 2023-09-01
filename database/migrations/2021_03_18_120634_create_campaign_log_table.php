<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create
        (
            'campaign_log', 
            function (Blueprint $table) 
            {
                $table->increments('id');
                $table->boolean('has_email')->default(false);
                $table->boolean('has_voucher')->default(false);
                $table->boolean('has_sms')->default(false);
                $table->boolean('has_whatsapp')->default(false);
                $table->boolean('has_push')->default(false);

                $table->integer('campaign_id')->unsigned();
                $table->integer('voucher_id')->unsigned()->nullable();

                $table->timestamps();
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
        Schema::dropIfExists('campaign_log');
    }
}
