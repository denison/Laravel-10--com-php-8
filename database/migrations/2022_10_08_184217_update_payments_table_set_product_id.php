<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentsTableSetProductId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('payments')
            ->join('giftcards', 'payments.giftcard_id', 'giftcards.id')
            ->whereNotNull('payments.giftcard_id')
            ->where('giftcards.is_product', true)
            ->update(
                [
                    'payments.product_id' => \DB::raw('payments.giftcard_id'),
                    'payments.giftcard_id' => null,
                ]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
