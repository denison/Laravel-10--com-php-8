<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentWithSubscriptionTableSetPaymentIdForeign extends Migration
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
            'payment_with_subscription', 
            function (Blueprint $table) 
            {
                $table->dropForeign('payment_with_subscription_payment_id_foreign');
                $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
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
            'payment_with_subscription', 
            function (Blueprint $table) 
            {
                $table->dropForeign('payment_with_subscription_payment_id_foreign');
                $table->foreign('payment_id')->references('id')->on('payments')->onDelete('restrict');
            }
        );
    }
}
