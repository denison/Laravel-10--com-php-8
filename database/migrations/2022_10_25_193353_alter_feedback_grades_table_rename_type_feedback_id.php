<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFeedbackGradesTableRenameTypeFeedbackId extends Migration
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
            $table->renameColumn('type_feedback_id', 'feedback_type_id');
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
            $table->renameColumn('feedback_type_id', 'type_feedback_id');
        });
    }
}
