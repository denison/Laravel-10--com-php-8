<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardsTableAddActive extends Migration
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
                $table->boolean('active')->default(true);
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
                $table->dropColumn('active');
            }
        );
    }
}
