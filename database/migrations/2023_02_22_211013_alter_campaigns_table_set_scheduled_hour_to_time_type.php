<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCampaignsTableSetScheduledHourToTimeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) 
        {
            $table->time('scheduled_hour')->change();
        });

        \DB::table('campaigns')->update(['scheduled_hour' => \DB::raw("str_to_date(second(scheduled_hour), '%H')")]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) 
        {
            $table->integer('scheduled_hour')->change();
        });
    }
}
