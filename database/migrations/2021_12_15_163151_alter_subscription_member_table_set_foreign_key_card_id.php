<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionMemberTableSetForeignKeyCardId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_member', function (Blueprint $table) 
        {
            $table->dropForeign('subscription_member_card_id_foreign');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_member', function (Blueprint $table) 
        {
            $table->dropForeign('subscription_member_card_id_foreign');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('restrict')->onUpdate('restrict');
        });
    }
}
