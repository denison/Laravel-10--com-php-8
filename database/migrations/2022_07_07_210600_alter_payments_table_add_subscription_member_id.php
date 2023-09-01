<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddSubscriptionMemberId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'payments', 
            function (Blueprint $table) 
            {
                $table->integer('subscription_member_id')->unsigned()->nullable()->after('subscription_id');
                $table->foreign('subscription_member_id')->references('id')->on('subscription_member')->onUpdate('cascade')->onDelete('set null');
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
        Schema::table(
            'payments', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['subscription_member_id']);
                $table->dropColumn('subscription_member_id');
            }
        );
    }
}
