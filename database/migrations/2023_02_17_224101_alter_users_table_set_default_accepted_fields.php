<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableSetDefaultAcceptedFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->boolean('accepted_mails')->default(true)->change();
            $table->boolean('accepted_sms')->default(true)->change();
            $table->boolean('accepted_whatsapp')->default(true)->change();
            $table->boolean('accepted_pushs')->default(true)->change();
        });

        \DB::table('users')->update(
            [
                'accepted_mails' => true,
                'accepted_sms' => true,
                'accepted_whatsapp' => true,
                'accepted_pushs' => true,
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->boolean('accepted_mails')->default(false)->change();
            $table->boolean('accepted_sms')->default(false)->change();
            $table->boolean('accepted_whatsapp')->default(false)->change();
            $table->boolean('accepted_pushs')->default(false)->change();
        });
    }
}
