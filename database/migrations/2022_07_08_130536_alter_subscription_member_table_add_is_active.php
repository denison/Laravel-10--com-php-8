<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionMemberTableAddIsActive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'subscription_member', 
            function (Blueprint $table) 
            {
                $table->boolean('is_active')->default(true)->after('subscription_id');
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
            'subscription_member', 
            function (Blueprint $table) 
            {
                $table->dropColumn('is_active');
            }
        );
    }
}
