<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMatchesTableAddStartedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'matches', 
            function (Blueprint $table) 
            {
                $table->dateTime('started_at')->after('hour');
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
        Schema::table(
            'matches', 
            function (Blueprint $table) 
            {
                $table->dropColumn('started_at');
            }
        );
    }
}
