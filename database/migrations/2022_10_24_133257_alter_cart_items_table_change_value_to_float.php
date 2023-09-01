<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCartItemsTableChangeValueToFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) 
        {
            $table->float('value')->change();
        });

        \DB::table('cart_items')
            ->join('giftcards as products', 'cart_items.product_id', 'products.id')
            ->join('carts', 'cart_items.cart_id', 'carts.id')
            ->leftJoin('payments', 'carts.id', 'payments.cart_id')
            ->whereNull('payments.id')
            ->update(
                [
                    'cart_items.value' => \DB::raw('products.value'),
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
    }
}
