<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionMemberTableAddCardId extends Migration
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
                $table->integer('card_id')->unsigned()->nullable(true)->default(null);
                $table->foreign('card_id')->references('id')->on('cards')->onDelete('restrict');
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
                $table->dropForeign(['card_id']);
                $table->dropColumn('card_id');
            }
        );
    }
}
