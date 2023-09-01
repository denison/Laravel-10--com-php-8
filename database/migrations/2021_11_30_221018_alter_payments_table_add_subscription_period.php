<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddSubscriptionPeriod extends Migration
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
                $table->string('subscription_period')->nullable()->after('subscription_id');
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
                $table->dropColumn('subscription_period');
            }
        );
    }
}
