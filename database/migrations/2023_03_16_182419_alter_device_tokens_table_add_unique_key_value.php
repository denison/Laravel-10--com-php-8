<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDeviceTokensTableAddUniqueKeyValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_tokens', function (Blueprint $table) 
        {
            $table->unique(['user_id', 'company_anchor_id', 'token']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_tokens', function (Blueprint $table) 
        {
            $table->dropUnique('device_tokens_user_id_company_anchor_id_token_unique');
        });
    }
}
