<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableAddMaxSending extends Migration
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
                $table->integer('max_sending_email')->nullable()->after('email_body');
                $table->integer('max_sending_push')->nullable()->after('push_body');
                $table->integer('max_sending_voucher')->nullable()->after('voucher_value');
                $table->integer('max_sending_sms')->nullable()->after('sms_body');
                $table->integer('max_sending_whatsapp')->nullable()->after('whatsapp_body');
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
                $table->dropColumn('max_sending_email');
                $table->dropColumn('max_sending_push');
                $table->dropColumn('max_sending_voucher');
                $table->dropColumn('max_sending_sms');
            }
        );
    }
}
