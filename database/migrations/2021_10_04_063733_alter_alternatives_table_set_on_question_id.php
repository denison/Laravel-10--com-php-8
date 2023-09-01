<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAlternativesTableSetOnQuestionId extends Migration
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
            'alternatives', 
            function (Blueprint $table) 
            {
                $table->dropForeign('alternatives_question_id_foreign');
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade')->onUpdate('cascade');
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
            'alternatives', 
            function (Blueprint $table) 
            {
                $table->dropForeign('alternatives_question_id_foreign');
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('restrict')->onUpdate('restrict');
            }
        );
    }
}
