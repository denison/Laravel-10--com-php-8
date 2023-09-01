<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCartItemsTableAddProductId extends Migration
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
            $table->integer('product_id')->unsigned()->nullable()->after('giftcard_id');
            $table->foreign('product_id')->references('id')->on('giftcards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) 
        {
            $table->dropColumn('product_id');
            $table->dropForeign(['product_id']);
        });
    }
}
