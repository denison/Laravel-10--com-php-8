<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFeedbackGradesTableAddForeignFeedbackIdAndFeedbackTypeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback_grades', function (Blueprint $table) 
        {
            $table->foreign('feedback_id')->references('id')->on('feedbacks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('feedback_type_id')->references('id')->on('feedback_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedback_grades', function (Blueprint $table) 
        {
            $table->dropForeign(['feedback_id']);
            $table->dropForeign(['feedback_type_id']);
        });
    }
}
