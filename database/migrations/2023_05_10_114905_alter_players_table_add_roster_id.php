<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlayersTableAddRosterId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'players', 
            function (Blueprint $table) 
            {
                $table->integer('roster_id')->after('company_id')->unsigned()->nullable();
                $table->foreign('roster_id')->references('id')->on('rosters')->onDelete('set null')->onUpdate('cascade');
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
            'players', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['roster_id']);
                $table->dropColumn(['roster_id']);
            }
        );

    }
}
