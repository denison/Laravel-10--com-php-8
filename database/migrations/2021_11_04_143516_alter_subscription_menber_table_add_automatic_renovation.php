<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionMenberTableAddAutomaticRenovation extends Migration
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
            'subscription_member', 
            function (Blueprint $table) 
            {
                $table->boolean('automatic_renovation')->default(true)->after('card_id');
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
            'subscription_member', 
            function (Blueprint $table)
            {
                $table->dropColumn('automatic_renovation');
            }
        );
    }
}
