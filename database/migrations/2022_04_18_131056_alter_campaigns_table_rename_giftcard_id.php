<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableRenameGiftcardId extends Migration
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
                $table->renameColumn('giftcard_id', 'voucher_giftcard_id');
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
                $table->renameColumn('voucher_giftcard_id', 'giftcard_id');
            }
        );
    }
}
