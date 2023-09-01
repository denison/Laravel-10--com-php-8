<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableAddDurationDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->integer('duration_days')->nullable();
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
            'subscriptions', 
            function (Blueprint $table) 
            {
                $table->dropColumn('duration_days');
            }
        );
    }
}
