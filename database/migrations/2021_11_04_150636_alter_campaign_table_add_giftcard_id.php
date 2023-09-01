<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignTableAddGiftcardId extends Migration
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
                $table->integer('giftcard_id')->after('voucher_value')->unsigned()->nullable();
                $table->foreign('giftcard_id')->references('id')->on('giftcards');
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
                $table->dropForeign('campaigns_giftcard_id_foreign');
                $table->dropColumn('giftcard_id');
               
            }
        );
    }
}
