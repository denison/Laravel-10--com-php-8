<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feedback_id')->unsigned();
            $table->foreign('feedback_id')->references('id')->on('feedbacks')->onDelete('restrict');
            $table->integer('type_feedback_id')->unsigned();
            $table->foreign('type_feedback_id')->references('id')->on('type_feedbacks')->onDelete('restrict');
            $table->integer('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grades');
    }
}
