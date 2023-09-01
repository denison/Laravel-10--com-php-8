<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPromotionalCodeRedeemsTableAddForeign extends Migration
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
            'promotional_code_redeems', 
            function (Blueprint $table) 
            {
                $table->foreign('promotional_code_id')->references('id')->on('promotional_codes')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
            'promotional_code_redeems', 
            function (Blueprint $table) 
            {
                $table->dropForeign(['promotional_code_id']);
                $table->dropForeign(['user_id']);
            }
        );
    }
}
