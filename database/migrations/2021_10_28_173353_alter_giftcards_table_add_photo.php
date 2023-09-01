<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGiftcardsTableAddPhoto extends Migration
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
                $table->string('photo')->after('name')->nullable();
                $table->string('description')->after('name')->nullable();
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
                $table->dropColumn('photo');
                $table->dropColumn('description');
               
            }
        );
    }
}
