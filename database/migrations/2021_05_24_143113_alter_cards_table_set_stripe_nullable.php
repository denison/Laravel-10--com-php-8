<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCardsTableSetStripeNullable extends Migration
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
            'cards', 
            function (Blueprint $table) 
            {
                $table->string('stripe_card_id')->nullable(true)->change();
                $table->string('pagarme_card_id')->nullable(true)->change();
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
            'cards', 
            function (Blueprint $table) 
            {
                $table->string('stripe_card_id')->nullable(false)->change();                
                $table->string('pagarme_card_id')->nullable(false)->change();
            }
        );
    }
}
