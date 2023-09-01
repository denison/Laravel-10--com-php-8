<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableSetAcceptedCampaigns extends Migration
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
            'users', 
            function (Blueprint $table) 
            {
                $table->boolean('accepted_campaigns')->nullable()->default(null)->change();
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
            'users', 
            function (Blueprint $table) 
            {
                $table->boolean('accepted_campaigns')->nullable(false)->default(false)->change();
            }
        );
    }
}
