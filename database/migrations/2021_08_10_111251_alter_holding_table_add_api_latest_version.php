<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHoldingTableAddApiLatestVersion extends Migration
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
                $table->string('app_latest_version')->nullable()->after('description');
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
                $table->dropColumn('app_latest_version');
            }
        );
    }
}
