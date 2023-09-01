<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAnswersTableAddQuizSubmissionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) 
        {
            $table->integer('quiz_submission_id')->unsigned()->nullable()->after('id');
            $table->foreign('quiz_submission_id')->references('id')->on('quiz_submissions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) 
        {
            $table->dropForeign(['quiz_submission_id']);
            $table->dropColumn('quiz_submission_id');
        });
    }
}
