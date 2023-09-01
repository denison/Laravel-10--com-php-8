<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVouchersTableAddGiftcardId extends Migration
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
                $table->integer('giftcard_id')->unsigned()->nullable();
                $table->foreign('giftcard_id')->references('id')->on('giftcards')->onDelete('restrict');
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
                $table->dropForeign(['giftcard_id']);
                $table->dropColumn('giftcard_id');
            }
        );
    }
}
