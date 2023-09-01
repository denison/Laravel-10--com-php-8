<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPaymentsTableAddCardId extends Migration
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
            'payments',
            function (Blueprint $table)
            {
                $table->integer('card_id')->unsigned()->nullable();
                $table->foreign('card_id')->references('id')->on('cards')->onUpdate('cascade');
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
            'payments',
            function (Blueprint $table)
            {
                $table->dropForeign(['card_id']);
                $table->dropColumn('card_id');
            }
        );
    }
}
