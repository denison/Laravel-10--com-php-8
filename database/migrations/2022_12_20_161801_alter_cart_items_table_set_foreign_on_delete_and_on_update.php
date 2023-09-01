<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCartItemsTableSetForeignOnDeleteAndOnUpdate extends Migration
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
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')->references('id')->on('giftcards')->onDelete('restrict')->onUpdate('cascade');
            
            $table->dropForeign(['giftcard_id']);
            $table->foreign('giftcard_id')->references('id')->on('giftcards')->onDelete('restrict')->onUpdate('cascade');
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
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')->references('id')->on('giftcards')->onDelete('restrict')->onUpdate('restrict');
            
            $table->dropForeign(['giftcard_id']);
            $table->foreign('giftcard_id')->references('id')->on('giftcards')->onDelete('restrict')->onUpdate('restrict');
        });
    }
}
