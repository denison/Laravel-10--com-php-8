<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPersonasTableAddFrequentDayAndAge extends Migration
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
            'personas',
            function (Blueprint $table)
            {
                $table->string('frequent_day')->after('city');
                $table->integer('age')->after('city');
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
            'personas',
            function (Blueprint $table)
            {
                $table->dropColumn('frequent_day');
                $table->dropColumn('age');
            }
        );
    }
}
