<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableSetStripeNullable extends Migration
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
                $table->string('stripe_transaction_id')->nullable(true)->default(null)->change();
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
                $table->string('stripe_transaction_id')->nullable(false)->change();
            }
        );
    }
}
