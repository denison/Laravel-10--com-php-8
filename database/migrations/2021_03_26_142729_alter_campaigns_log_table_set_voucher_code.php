<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsLogTableSetVoucherCode extends Migration
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
                if (Schema::hasColumn('campaigns_log', 'voucher_code'))
                {
                    if (collect(\DB::select("show indexes from campaigns_log"))->pluck('Key_name')->contains('campaigns_log_voucher_code_unique'))
                    {
                        $table->dropUnique('campaigns_log_voucher_code_unique');
                    }

                    $table->string('voucher_code')->nullable()->change();
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
                if (Schema::hasColumn('campaigns_log', 'voucher_code'))
                {
                    $table->integer('voucher_code')->unsigned()->nullable()->change();
                }
            }
        );
    }
}
