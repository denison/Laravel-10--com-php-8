<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableSetVoucherCodeToUuid extends Migration
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
            'campaigns_log', 
            function (Blueprint $table) 
            {
                $table->uuid('voucher_code')->default(null)->change();
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
            'campaigns_log', 
            function (Blueprint $table) 
            {
                $table->string('voucher_code')->nullable()->change();
            }
        );
    }
}
