<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPersonasTableAlterTypeFrequentDay extends Migration
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
                $table->integer('frequent_day')->change();
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
                $table->string('frequent_day')->change();
            }
        );
    }
}
