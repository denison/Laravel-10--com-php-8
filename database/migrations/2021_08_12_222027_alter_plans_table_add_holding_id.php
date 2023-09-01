<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlansTableAddHoldingId extends Migration
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
            'plans', 
            function (Blueprint $table) 
            {
                $table->integer('holding_id')->unsigned()->nullable();
                $table->foreign('holding_id')->references('id')->on('holdings')->onDelete('restrict');
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
            'plans', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['holding_id']);
                $table->dropColumn('holding_id');
            }
        );
    }
}
