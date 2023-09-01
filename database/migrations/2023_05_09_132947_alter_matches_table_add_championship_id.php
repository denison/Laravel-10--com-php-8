<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMatchesTableAddChampionshipId extends Migration
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
                $table->integer('championship_id')->unsigned()->nullable()->after('company_id');
                $table->foreign('championship_id')->references('id')->on('championships')->onDelete('restrict')->onUpdate('cascade');
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
                $table->dropForeign(['championship_id']);
                $table->dropColumn(['championship_id']);
            }
        );
    }
}
