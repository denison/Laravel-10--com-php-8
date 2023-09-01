<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardsTableAddInstructions extends Migration
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
            'giftcards', 
            function (Blueprint $table) 
            {
                $table->string('instructions', 999)->nullable()->after('name');
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
            'giftcards', 
            function (Blueprint $table)
            {
                $table->dropColumn('instructions');
            }
        );
    }
}
