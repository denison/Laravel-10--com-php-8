<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableRenameVoucherId extends Migration
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
                if (Schema::hasColumn('campaigns_log', 'voucher_id'))
                {
                    $table->renameColumn('voucher_id', 'voucher_code');
                }
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
                if (Schema::hasColumn('campaigns_log', 'voucher_id'))
                {
                    $table->renameColumn('voucher_code', 'voucher_id');
                }
            }
        );
    }
}
