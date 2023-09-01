<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSubscriptionsTableDropPaymentLink extends Migration
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
                $table->dropColumn('payment_link');
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
                $table->string('payment_link')->nullable();
            }
        );
    }
}
