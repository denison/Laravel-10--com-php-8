<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGradesTableDropForeignFeedbackIdAndTypeFeedbackId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) 
        {
            $table->dropForeign(['feedback_id']);
            $table->dropForeign(['type_feedback_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grades', function (Blueprint $table) 
        {
            $table->foreign('feedback_id')->references('id')->on('feedbacks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_feedback_id')->references('id')->on('type_feedbacks')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
