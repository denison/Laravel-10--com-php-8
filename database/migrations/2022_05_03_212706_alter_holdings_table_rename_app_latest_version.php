<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingsTableRenameAppLatestVersion extends Migration
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
            'holdings', 
            function (Blueprint $table) 
            {
                $table->renameColumn('app_latest_version', 'app_latest_version_ios');
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
            'holdings', 
            function (Blueprint $table) 
            {
                $table->renameColumn('app_latest_version_ios', 'app_latest_version');
            }
        );
    }
}
