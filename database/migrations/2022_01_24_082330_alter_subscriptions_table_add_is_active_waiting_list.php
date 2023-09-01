<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableAddIsActiveWaitingList extends Migration
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->boolean('is_accept_waiting_list')->default(true)->after('is_active');
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->dropColumn('is_accept_waiting_list');
            }
        );
    }
}
