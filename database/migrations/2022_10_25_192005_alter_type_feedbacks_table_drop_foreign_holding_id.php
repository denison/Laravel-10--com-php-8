<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTypeFeedbacksTableDropForeignHoldingId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_feedbacks', function (Blueprint $table) 
        {
            $table->dropForeign(['holding_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_feedbacks', function (Blueprint $table) 
        {
            $table->foreign('holding_id')->references('id')->on('holdings')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
