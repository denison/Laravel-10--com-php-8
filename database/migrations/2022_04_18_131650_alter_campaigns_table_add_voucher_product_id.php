<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableAddVoucherProductId extends Migration
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
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->integer('voucher_product_id')->unsigned()->nullable()->after('voucher_giftcard_id');
                $table->foreign('voucher_product_id')->references('id')->on('giftcards')->onDelete('restrict');
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
            'campaigns', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['voucher_product_id']);
                $table->dropColumn('voucher_product_id');
            }
        );
    }
}
