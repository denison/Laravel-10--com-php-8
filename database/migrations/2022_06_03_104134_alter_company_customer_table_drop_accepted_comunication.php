<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyCustomerTableDropAcceptedComunication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_customer', function (Blueprint $table) {
            $table->dropColumn('is_follower');
            $table->dropColumn('accepted_mails');
            $table->dropColumn('accepted_pushs');
            $table->dropColumn('accepted_sms');
            $table->dropColumn('accepted_whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_customer', function (Blueprint $table) {
            $table->boolean('is_follower')->default(true);
            $table->boolean('accepted_mails')->default(true);
            $table->boolean('accepted_pushs')->default(true);
            $table->boolean('accepted_sms')->default(true);
            $table->boolean('accepted_whatsapp')->default(true);            
        });
    }
}
