<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableAddProductId extends Migration
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
            'vouchers', 
            function (Blueprint $table) 
            {
                $table->integer('product_id')->unsigned()->nullable()->after('giftcard_id');
                $table->foreign('product_id')->references('id')->on('giftcards')->onDelete('cascade')->onUpdate('cascade');
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
            'vouchers', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
        );
    }
}
