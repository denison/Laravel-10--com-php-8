<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcceptedFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('accepted_campaigns');
            $table->boolean('accepted_mails')->default(false);
            $table->boolean('accepted_sms')->default(false);
            $table->boolean('accepted_whatsapp')->default(false);
            $table->boolean('accepted_pushs')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('accepted_campaigns')->default(false);
            $table->dropColumn('accepted_mails');
            $table->dropColumn('accepted_sms');
            $table->dropColumn('accepted_whatsapp');
            $table->dropColumn('accepted_pushs');
        });
    }
}
