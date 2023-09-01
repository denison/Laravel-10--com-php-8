<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableSetVoucherExpires extends Migration
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
                $table->integer('voucher_expires')->change();
            }
        );
    }

    /**
     * Reverse the migrations
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
                $table->date('voucher_expires')->change();
            }
        );
    }
}
