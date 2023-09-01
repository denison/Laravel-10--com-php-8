<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScoreboardToMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) 
        {
            $table->integer('scoreboard_home')->nullable();
            $table->integer('scoreboard_challenging')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) 
        {
            $table->dropColumn('scoreboard_home');
            $table->dropColumn('scoreboard_challenging');
        });
    }
}
