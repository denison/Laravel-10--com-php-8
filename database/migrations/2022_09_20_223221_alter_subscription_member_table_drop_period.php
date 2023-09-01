<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionMemberTableDropPeriod extends Migration
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
                $table->dropColumn('period');
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
                $table->string('period')->nullable();
            }
        );
    }
}
