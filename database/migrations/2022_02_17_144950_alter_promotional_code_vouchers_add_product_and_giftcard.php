<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeVouchersAddProductAndGiftcard extends Migration
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
            'promotional_code_vouchers', 
            function (Blueprint $table) 
            {
                $table->integer('product_id')->unsigned()->nullable()->after('company_id');
                $table->integer('giftcard_id')->unsigned()->nullable()->after('company_id');
                $table->foreign('product_id')->references('id')->on('giftcards')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('giftcard_id')->references('id')->on('giftcards')->onDelete('cascade')->onUpdate('cascade');
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
            'promotional_code_vouchers', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
                $table->dropForeign(['giftcard_id']);
                $table->dropColumn('giftcard_id');
            }
        );
    }
}
