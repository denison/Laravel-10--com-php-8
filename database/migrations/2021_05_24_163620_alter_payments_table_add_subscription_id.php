<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddSubscriptionId extends Migration
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
            'payments', 
            function (Blueprint $table) 
            {
                $table->integer('subscription_id')->unsigned()->nullable();
                $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('restrict');
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
            'payments', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['subscription_id']);
                $table->dropColumn('subscription_id');
            }
        );
    }
}
